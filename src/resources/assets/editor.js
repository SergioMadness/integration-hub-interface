const conditionBlockModel = function (module) {
    const self = this;

    self.selectedModule = ko.observable(module);
    self.selectedField = null;
    self.freeInput = null;
    self.isNot = false;
    self.condition = null;
    self.value = null;
};

const targetBlock = function () {
    const self = this;

    self.conditions = ko.observableArray();
    self.target = null;

    self.addCondition = function () {
        self.conditions.push(new conditionBlockModel());
    };

    self.removeCondition = function (item) {
        self.conditions.remove(item);
    };

    if (self.conditions.length === 0) {
        self.addCondition();
    }
}

const ioModel = function (key, val) {
    const self = this;

    self.key = key;
    self.value = val;
};

const moduleModel = function (alias, name, availableInput, availableOutput) {
    const self = this;

    self.alias = alias;
    self.name = name;
    self.availableInput = [];
    self.availableOutput = [];

    for (let key in availableInput) {
        self.availableInput.push(new ioModel(key, availableInput[key]));
    }
    for (let key in availableOutput) {
        self.availableOutput.push(new ioModel(key, availableOutput[key]));
    }
};

const propertiesModel = function () {
    const self = this;

    self.targetBlocks = ko.observableArray();


    self.properties = ko.observableArray();

    self.propertiesVisible = ko.observable(false);
    self.conditionsVisible = ko.observable(true);

    self.availableModules = ko.observableArray();

    self.availableConditions = [
        '=',
        '>',
        '<',
        '!',
        'between',
        'in',
        'empty'
    ];

    self.showProperties = function () {
        self.propertiesVisible(true);
        self.conditionsVisible(false);
    };

    self.showConditions = function () {
        self.propertiesVisible(false);
        self.conditionsVisible(true);
    };

    self.setProperties = function (properties) {
        self.properties(properties);
    };

    self.pushModule = function (alias, name, input, output) {
        self.availableModules.push(new moduleModel(alias, name, input, output));
    };

    self.addTargetBlock = function () {
        self.targetBlocks.push(new targetBlock());
    };

    self.deleteTargetBlock = function (block) {
        self.targetBlocks.remove(block);
    };
};

let propertiesModelInstance = null;
$(document).ready(function () {
    propertiesModelInstance = new propertiesModel();

    ko.applyBindings(propertiesModelInstance, document.getElementById('properties'));
});