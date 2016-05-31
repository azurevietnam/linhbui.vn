<?php
$id = uniqid('_');
?>
<div id="<?= $id ?>">
    <div class="slideshow-images">
        <div class="wrap">
        </div>
    </div>
    <button class="bt-prev">
        <svg fill="#333" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
    <button class="bt-next">
        <svg fill="#333" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
</div>

<style>
#<?= $id ?> {
    width: 100%;
    position: relative;
    white-space: nowrap;
    overflow: hidden;
}
#<?= $id ?> .slideshow-images {
    width: 60%;
    margin: 0 auto;
}
#<?= $id ?> figure {
    position: relative;
    padding: 0;
    margin: 0;
    width: 100%;
    vertical-align: middle;
    text-align: center;
    display: inline-block;
}
#<?= $id ?> .wrap {
}
#<?= $id ?> img {
    vertical-align: middle;
    max-width: calc(90%);
}
#<?= $id ?> figcaption {
    position: absolute;
    width: fit-content;
    width: -ms-fit-content;
    width: -moz-fit-content;
    width: -webkit-fit-content;
    max-width: calc(80%);
    box-sizing: content-box;
    word-wrap: break-word;
    white-space: normal;
    padding: 3px 6px;
    z-index: 9;
    text-align: center;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
    color: #fff;
    background: rgba(20, 20, 20, 0.5);
}
#<?= $id ?> .bt-prev,
#<?= $id ?> .bt-next {
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    height: 50%;
    min-height: 3.5em;
    width: 3.5em;
    background: transparent;
    border: none;
    outline: none;
    opacity: 0.8;
    border-radius: 0.25em;
    border: 1px solid rgba(80, 80, 80, 0.5);
    background: rgba(255, 255, 255, 0.5);
}
#<?= $id ?> .bt-prev:hover,
#<?= $id ?> .bt-next:hover {
    opacity: 1;
    background: rgba(255, 255, 255, 0.75);
    border-color: rgba(90, 90, 90, 0.75);
}
#<?= $id ?> .bt-prev {
    left: 0;
}
#<?= $id ?> .bt-next {
    right: 0;
}
#<?= $id ?> .bt-prev > svg,
#<?= $id ?> .bt-next > svg {
    width: calc(100%);
    height: calc(100%);
}
@media screen and (max-width: 640px) {
    #<?= $id ?> .slideshow-images {
        width: 100%;
    }
    #<?= $id ?> img {
        max-width: calc(100%);
    }
}
</style>

<script>
/* SLIDESHOW: BEGIN */
// CONFIG
var opts = <?= json_encode($options) ?>;
var data = <?= json_encode($data) ?>;
// PARAMS
var g = document.getElementById("<?= $id ?>");
var a = g.getElementsByClassName("slideshow-images")[0];
var c = a.getElementsByClassName("wrap")[0];
var bt_prev = g.getElementsByClassName("bt-prev")[0];
var bt_next = g.getElementsByClassName("bt-next")[0];
var w, x; // w = width of figure; x = key of current figure element of c
// RUN
if (data.length > 0) {
    run();
}
window.addEventListener("resize", function() {
    setParams();
});

// FUNCTION
function setParams() {
    w = window.getComputedStyle(a, null).getPropertyValue("width");
    x = 0;
    c.style.transition = "margin " + String(0.001 * parseInt(opts.time_slide)) + "s ease";
}
function removeElems() {
    c.innerHTML = "";
}
function initPreviewElems() {
    a.style.width = opts.box_width_preview;
    var x = 0;
    var y = opts.img_number_preview;
    if (parseInt(y) > data.length) {
        y = data.length;
    }
    var fig = document.createElement("figure");
    for (var i = x; i < y - x; i++) {
        var img = document.createElement("img");
        img.setAttribute("src", data[i].img_src_preview);
        if (data[i].img_alt !== "") {
            img.setAttribute("alt", data[i].img_alt);
            img.setAttribute("title", data[i].img_alt);
        }
        img.addEventListener("load", function() {
            var r = parseInt(this.naturalWidth) / parseInt(this.naturalHeight);
            this.style.marginRight = opts.img_margin_preview;
            this.style.marginLeft = opts.img_margin_preview;
            if (r > opts.img_wph_ratio_preview) {
                this.style.height = "auto";
                this.style.maxWidth = "calc(" + (100 / y) + "% - " + y * parseInt(opts.img_margin_preview) + "%)";
            } else {
                this.style.width = "auto";
                if (opts.img_max_height_preview !== "") {
                    this.style.maxHeight = opts.img_max_height_preview;
                }
            }
        });
        fig.appendChild(img);
    }
    c.appendChild(fig);
}
function initElems() {
    a.style.width = opts.box_width;
    var x = 0;
    var y = data.length;
    for (var i = x; i < y - x; i++) {
        var fig = document.createElement("figure");
        var img = document.createElement("img");
        img.setAttribute("src", data[i].img_src);
        if (data[i].img_alt !== "") {
            img.setAttribute("alt", data[i].img_alt);
            img.setAttribute("title", data[i].img_alt);
        }
        img.addEventListener("load", function() {
            var r = parseInt(this.naturalWidth) / parseInt(this.naturalHeight);
            if (r > opts.img_wph_ratio) {
                this.style.height = "auto";
                if (opts.img_max_width !== "") {
                    this.style.maxWidth = opts.img_max_width;
                }
            } else {
                this.style.width = "auto";
                if (opts.img_max_height !== "") {
                    this.style.maxHeight = opts.img_max_height;
                }
            }
        });
        fig.appendChild(img);
        if (data[i].caption !== "") {
            var cap = document.createElement("figcaption");
            cap.innerHTML = data[i].caption;
            fig.appendChild(cap);
        }
        c.appendChild(fig);
    }
}
function run() {
    var init_completed = false;
    initPreviewElems();
    setParams();
    bt_next.addEventListener("click", function() {
        if (!init_completed) {
            removeElems();
            initElems();
            setParams();
            init_completed = true;
        }
        a.scrollIntoView({block: "start", behavior: "smooth"});
        next();
    });
    bt_prev.addEventListener("click", function() {
        if (!init_completed) {
            removeElems();
            initElems();
            setParams();
            init_completed = true;
        }
        a.scrollIntoView({block: "start", behavior: "smooth"});
        prev();
    });
    if (opts.auto_run || typeof opts.auto_run === "undefined") {
        var auto_run = setInterval(function() {next();}, opts.time_out);
        if (opts.pause_on_hover || typeof opts.pause_on_hover === "undefined") {
            g.addEventListener("mouseover", function() {
                clearInterval(auto_run);
            });
            g.addEventListener("mouseout", function() {
                auto_run = setInterval(function() {
                    next();
                }, opts.time_out);
            });
        }
    }
};
function next() {
    if (x < c.children.length - 1) {
        x++;
    } else {
        x = 0;
    }
    setMargin(x);
};
function prev() {
    if (x > 0) {
        x--;
    } else {
        x = c.children.length - 1;
    }
    setMargin(x);
};
function setMargin(x) {
    c.style.marginLeft = "-" + String(x * parseInt(w)) + "px";
    c.style.marginRight = "+" + String(x * parseInt(w)) + "px";
};
/* SLIDESHOW: END */
</script>