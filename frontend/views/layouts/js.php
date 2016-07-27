<script type="text/javascript" language="javascript">
//Top menu slide down and up
var menu = {
    showNext : function(e) {
        var duration = 300;
        var timeout = 20;
        var u = e.nextElementSibling; // and overflow hidden
        u.style.transition = "all " + 0.001 * duration + "s";
        if (u.classList.contains("open")) {
            u.style.height = u.scrollHeight + "px";
        }
        setTimeout(function() {
            if (u.classList.contains("open")) {
                u.classList.remove("open");
                u.style.height = "0px";
                if (!e.classList.contains("main-button")) {
                    e.innerHTML = "<i class=\"right-orange-arrow\"></i>";
                }
            } else {
                u.classList.add("open");
                u.style.height = u.scrollHeight + "px";
                if (!e.classList.contains("main-button")) {
                    e.innerHTML = "<i class=\"down-orange-arrow\"></i>";
                }
            }
        }, timeout);
        setTimeout(function() {
            if (u.classList.contains("open")) {
                u.style.transition = "all 0s";
                u.style.height = "auto";
            }
        }, duration + timeout);
    }
};
window.addEventListener("load", function() {
    if (window.innerHeight < 741) { // value from CSS
        mbts = document.querySelectorAll(".menu button");
        for (var i = 0; i < mbts.length; i++) {
            mbts[i].addEventListener("click", function() {
                menu.showNext(this);
            });
        }
    }
});

//Paragraph html
paragraphStyle();
thumnailStyle();
window.addEventListener("load", function(){
    paragraphStyle();
    thumnailStyle();
});
window.addEventListener("resize", function(){
    paragraphStyle();
    thumnailStyle();
});
function paragraphStyle() {
    var g;
    var gs = document.getElementsByClassName("paragraph");
    for (var k = 0; k < gs.length; k++) {
        g = gs[k];
        if (typeof(g) !== "undefined" && g !== null) {
            var g_w = parseInt(window.getComputedStyle(g, null).getPropertyValue("width"));
            var els = g.querySelectorAll("*");
            for (var i = 0; i < els.length; i++) {
                setStyle(els[i]);
            }
            function setStyle(el) {
                el_w = parseInt(window.getComputedStyle(el, null).getPropertyValue("width"));
                if (el_w > g_w) {
                    el.style.maxWidth = "initial";
                    el.style.maxHeight = "initial";
                    el.style.minWidth = "initial";
                    el.style.minHeight = "initial";
                    el.style.paddingRight = "0px";
                    el.style.paddingLeft = "0px";
                    el.style.boxSizing = "border-box";
                    el.style.height = "auto";
                    el.style.width = "100%";
                }
            }
        }
    }
}

function thumnailStyle() {
    var ths = document.querySelectorAll(".list-view .thumb");
    var d;
    for (var i = 0; i < ths.length; i++) {
        (function(index) {
            ths[index].onmouseover = function() {
                d = ths[index].querySelector(".desc");
                d.style.marginTop = 0.5 * (ths[index].clientHeight - d.offsetHeight) + "px";
            };
        })(i);
    }
}
</script>