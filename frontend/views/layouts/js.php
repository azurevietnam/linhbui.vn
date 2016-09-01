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
            fitContent(g);
        }
    }
    function fitContent(p) {
        var p_es = p.querySelectorAll("img, table, video, object, iframe");
        p.onload = function() {
            setStyle(p);
        };
        for (var i = 0; i < p_es.length; i++) {
            (function(e){
                e.onload = function() {
                    setStyle(p);
                };
            })(p_es[i]);
        };
    };
    function setStyle(e) {
        var e_style = window.getComputedStyle(e, null);
        var e_bsz = e_style.getPropertyValue("box-sizing");
        e.style.boxSizing = "content-box";
        var e_w = parseInt(e_style.getPropertyValue("width"));
        e.style.boxSizing = e_bsz;
        for (var i = 0; i < e.children.length; i++) {
            (function(c) {
                var c_style = window.getComputedStyle(c, null);
                var c_maw = c_style.getPropertyValue("maxWidth");
                c.style.maxWidth = "initial";

                var c_bsz = c_style.getPropertyValue("box-sizing");
                c.style.boxSizing = "border-box";
                var c_w = parseInt(c_style.getPropertyValue("width"));
                c.style.boxSizing = c_bsz;
                if (c_w > e_w) {
                    c.style.boxSizing = "border-box";
                    c.style.height = "auto";
                    c.style.width = "100%";
                }

                c.style.maxWidth = c_maw;
                setStyle(c);
            })(e.children[i]);
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