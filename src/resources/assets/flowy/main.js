document.addEventListener("DOMContentLoaded", function () {
    var rightcard = false;
    var tempblock;
    var tempblock2;

    flowy(document.getElementById("canvas"), drag, release, snapping);

    function addEventListenerMulti(type, listener, capture, selector) {
        var nodes = document.querySelectorAll(selector);
        for (var i = 0; i < nodes.length; i++) {
            nodes[i].addEventListener(type, listener, capture);
        }
    }

    function snapping(drag, first) {
        return true;
    }

    function drag(block) {
        block.classList.add("blockdisabled");
        tempblock2 = block;
    }

    function release() {
        tempblock2.classList.remove("blockdisabled");
    }

    var disabledClick = function () {
        document.querySelector(".navactive").classList.add("navdisabled");
        document.querySelector(".navactive").classList.remove("navactive");
        this.classList.add("navactive");
        this.classList.remove("navdisabled");
        if (this.getAttribute("id") == "triggers") {
            document.getElementById("blocklist").innerHTML = '<div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="1"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                  <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/eye.svg"></div><div class="blocktext">                        <p class="blocktitle">New visitor</p><p class="blockdesc">Triggers when somebody visits a specified page</p>        </div></div></div><div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="2"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                    <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/action.svg"></div><div class="blocktext">                        <p class="blocktitle">Action is performed</p><p class="blockdesc">Triggers when somebody performs a specified action</p></div></div></div><div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="3"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                    <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/time.svg"></div><div class="blocktext">                        <p class="blocktitle">Time has passed</p><p class="blockdesc">Triggers after a specified amount of time</p>          </div></div></div><div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="4"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                    <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/error.svg"></div><div class="blocktext">                        <p class="blocktitle">Error prompt</p><p class="blockdesc">Triggers when a specified error happens</p>              </div></div></div>';
        } else if (this.getAttribute("id") == "actions") {
            document.getElementById("blocklist").innerHTML = '<div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="5"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                  <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/database.svg"></div><div class="blocktext">                        <p class="blocktitle">New database entry</p><p class="blockdesc">Adds a new entry to a specified database</p>        </div></div></div><div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="6"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                  <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/database.svg"></div><div class="blocktext">                        <p class="blocktitle">Update database</p><p class="blockdesc">Edits and deletes database entries and properties</p>        </div></div></div><div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="7"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                  <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/action.svg"></div><div class="blocktext">                        <p class="blocktitle">Perform an action</p><p class="blockdesc">Performs or edits a specified action</p>        </div></div></div><div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="8"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                  <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/twitter.svg"></div><div class="blocktext">                        <p class="blocktitle">Make a tweet</p><p class="blockdesc">Makes a tweet with a specified query</p>        </div></div></div>';
        } else if (this.getAttribute("id") == "loggers") {
            document.getElementById("blocklist").innerHTML = '<div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="9"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                  <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/log.svg"></div><div class="blocktext">                        <p class="blocktitle">Add new log entry</p><p class="blockdesc">Adds a new log entry to this project</p>        </div></div></div><div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="10"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                  <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/log.svg"></div><div class="blocktext">                        <p class="blocktitle">Update logs</p><p class="blockdesc">Edits and deletes log entries in this project</p>        </div></div></div><div class="blockelem create-flowy noselect"><input type="hidden" name="blockelemtype" class="blockelemtype" value="11"><div class="grabme"><img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg"></div><div class="blockin">                  <div class="blockico"><span></span><img src="/professionalweb/integration-hub-interface/flowy/images/error.svg"></div><div class="blocktext">                        <p class="blocktitle">Prompt an error</p><p class="blockdesc">Triggers a specified error</p>        </div></div></div>';
        }
    }
    addEventListenerMulti("click", disabledClick, false, ".side");
    document.getElementById("close").addEventListener("click", function () {
        if (rightcard) {
            rightcard = false;
            document.getElementById("properties").classList.remove("expanded");
            setTimeout(function () {
                document.getElementById("propwrap").classList.remove("itson");
            }, 300);
            tempblock.classList.remove("selectedblock");
        }
    });
    
    var aclick = false;
    var noinfo = false;
    var beginTouch = function (event) {
        aclick = true;
        noinfo = false;
        if (event.target.closest(".create-flowy")) {
            noinfo = true;
        }
    }
    var checkTouch = function (event) {
        aclick = false;
    }
    var doneTouch = function (event) {
        if (event.type === "mouseup" && aclick && !noinfo) {
            if (!rightcard && event.target.closest(".block") && !event.target.closest(".block").classList.contains("dragging")) {
                console.log(event.target.closest(".block").classList.contains("dragging"));
                tempblock = event.target.closest(".block");
                rightcard = true;
                document.getElementById("properties").classList.add("expanded");
                document.getElementById("propwrap").classList.add("itson");
                tempblock.classList.add("selectedblock");
            }
        }
    }
    addEventListener("mousedown", beginTouch, false);
    addEventListener("mousemove", checkTouch, false);
    addEventListener("mouseup", doneTouch, false);
    addEventListenerMulti("touchstart", beginTouch, false, ".block");
});