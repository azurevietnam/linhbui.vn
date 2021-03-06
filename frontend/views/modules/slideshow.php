<div id="slideshow-container">
    <div id="slideshow-images">
    <div class="wrap"><?php
    foreach ($data as $item) {
        ?><figure><img src="<?= $item['img_src'] ?>" alt="<?= $item['img_alt'] ?>"></figure><?php
    }
    ?></div>
    </div>
    <?php
    $num = count($data);
    ?>
    <button class="bt-prev" <?= $num < 2 ? 'style="display:none"' : '' ?>>
        <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
    <button class="bt-next" <?= $num < 2 ? 'style="display:none"' : '' ?>>
        <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
</div>

<style>
#slideshow-container {
    width: 100%;
    position: relative;
    white-space: nowrap;
    overflow: hidden;
}
#slideshow-images {
    width: 100%;
    <?= isset($options['img_max_width']) ? "max-width: {$options['img_max_width']}" : '' ?>;
    margin: 0 auto;
}
#slideshow-images figure {
    position: relative;
    width: 100%;
    vertical-align: top;
    display: inline-block;
    line-height: 0;
    opacity: 0.4;
}
#slideshow-images figure.active {
    opacity: 1;
}
#slideshow-images .wrap {
}
#slideshow-images img {
    vertical-align: middle;
    width: 100%;
}
#slideshow-images figcaption {
    position: absolute;
    width: fit-content;
    width: -ms-fit-content;
    width: -moz-fit-content;
    width: -webkit-fit-content;
    box-sizing: content-box;
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
.bt-prev,
.bt-next {
    position: absolute;
    top: 0;
    bottom: 0;
    height: 100%;
    width: 12%;
    min-width: 3em;
    background: transparent;
    border: none;
    outline: none;
    opacity: 0.8;
}
.bt-prev:hover,
.bt-next:hover {
    opacity: 1;
}
.bt-prev {
    left: 0;
}
.bt-next {
    right: 0;
}
.bt-prev > svg,
.bt-next > svg {
    width: 48px;
    height: 48px;
}
@media screen and (max-width: 640px) {
    .bt-prev > svg,
    .bt-next > svg {
        width: 36px;
        height: 36px;
    }
    #slideshow-images {
        width: 100%;
    }
    #slideshow-images figure {
        width: 100%;
        margin: 0;
    }
}
.bt-prev > span {
    background-position: 0 0;
}
.bt-next > span {
    background-position: -28px 0;
}
</style>

<script>
/* SLIDESHOW: BEGIN */
// CONFIG
// opts = {"auto_run":true,"time_slide":300,"time_out":3000,"pause_on_hover":true,"always_align_center":true}
var opts = <?= json_encode($options) ?>;
// PARAMS
var g = document.getElementById("slideshow-container");
var a = document.getElementById("slideshow-images");
var c = a.children[0];
var num = c.children.length;
var bt_prev = g.getElementsByClassName("bt-prev")[0];
var bt_next = g.getElementsByClassName("bt-next")[0];
var w, u, df, x, min_x, max_x; // w = width of #slideshow-images; u = width of #slideshow-container; x = key of current figure element of c
var cloned = false;
var begin_set_time_slide = false;
// RUN
run();
window.addEventListener("load", function(){
    setParams();
});
window.addEventListener("resize", function(){
    setParams();
});

// FUNCTION
function setParams() {
    u = window.getComputedStyle(g, null).getPropertyValue("width");
    w = window.getComputedStyle(a, null).getPropertyValue("width");
    if (opts.always_align_center || typeof opts.always_align_center === "undefined") {
        if (!cloned) {
            cloned = true;
            var c0 = c.children[0].cloneNode(true);
            var cn = c.children[num - 1].cloneNode(true);
            c.appendChild(c0);
            c.insertBefore(cn, c.children[0]);
        }
        min_x = 1;
        max_x = num;
        df = 0;
    } else {
        min_x = 0;
        max_x = c.children.length - 1;
        df = 0.5 * (parseInt(u) - parseInt(w)) / parseInt(w);
    }
    x = min_x;
    
    if (!begin_set_time_slide) {
        begin_set_time_slide = true;
    } else {
        c.style.transition = "margin " + String(0.001 * parseInt(opts.time_slide)) + "s ease";
    }
}
function run() {
    setParams();
    setActiveClass(min_x);
    setMargin(min_x + df);
    bt_next.addEventListener("click", function() {
        next();
    });
    bt_prev.addEventListener("click", function() {
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
    if (x < max_x) {
        x++;
    } else {
        x = min_x;
    }
    
    setActiveClass(x);
    
    if (x === min_x) {
        setMargin(x + df);
    } else if (x === max_x) {
        setMargin(x - df);
    } else {
        setMargin(x);
    }
};
function prev() {
    if (x > min_x) {
        x--;
    } else {
        x = max_x;
    }
    
    setActiveClass(x);
    
    if (x === min_x) {
        setMargin(x + df);
    } else if (x === max_x) {
        setMargin(x - df);
    } else {
        setMargin(x);
    }
};
function setMargin(x) {
    c.style.marginLeft = "-" + String(x * parseInt(w)) + "px";
    c.style.marginRight = "+" + String(x * parseInt(w)) + "px";
};
function setActiveClass(x) {
    for (var i = min_x; i <= max_x; i++) {
        if (i === x) {
            c.children[i].style.transition = "all " + String(0.001 * parseInt(opts.time_slide)) + "s ease";
            c.children[i].classList.add("active");
        } else {
            c.children[i].classList.remove("active");
        }
    }
}
/* SLIDESHOW: END */
</script>