<div id="photo-slideshow">
    <div class="view">
        <div class="slide">
            <!-- Put all slideshow photos here -->
            <?php
            foreach ($data as $item) {
                ?><figure>
                    <img src="<?= $item['img_src'] ?>" alt="<?= $item['img_alt'] ?>">
                </figure><?php
            }
            ?>
        </div>
        <!-- Two control buttons -->
        <button class="prev-button">
            <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
        </button>
        <button class="next-button">
            <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
        </button>
    </div>
</div>

<style>
#photo-slideshow,
#photo-slideshow * {
    position: relative;
    margin: 0;
    padding: 0;
}
#photo-slideshow,
#photo-slideshow view,
#photo-slideshow slide,
#photo-slideshow figure,
#photo-slideshow img {
    width: 100%;
}
#photo-slideshow .view figure {
    position: absolute;
    top: 0;
    left: 0;
    line-height: 0;
    opacity: 0;
    transition: opacity 0.5s;
    -webkit-transition: opacity 0.5s;
}
#photo-slideshow .view figure.active {
    position: relative;
    opacity: 1;
}
#photo-slideshow button {
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    height: 3em;
    width: 3em;
    background: transparent;
    border: none;
    outline: none;
    opacity: 0.8;
    background: rgba(125, 125, 125, 0.5);
}
#photo-slideshow button:hover {
    opacity: 1;
    background: rgba(247, 215, 48, 0.6);
}
#photo-slideshow .prev-button {
    left: 0;
}
#photo-slideshow .next-button {
    right: 0;
}
</style>
<style>
#photo-slideshow .preview {
    white-space: nowrap;
    margin-top: calc(5px - 3px);
    padding: 3px;
    overflow: hidden;
}
#photo-slideshow .preview .slide {
    transition: margin 0.5s;
}
#photo-slideshow .preview figure {
    margin-right: 5px;
    display: inline-block;
    cursor: pointer;
    line-height: 0;
    box-sizing: border-box;
    vertical-align: middle;
}
#photo-slideshow .preview figure.active {
    outline: 3px solid #fedd68;
}
#photo-slideshow .preview button {
    height: 2.3em;
    width: 2.3em;
    <?= count($data) <= $preview_options['items_per_page'] ? 'display: none;' : '' ?>
</style>
<script>
var slideshow = document.getElementById("photo-slideshow");

var view = slideshow.getElementsByClassName("view")[0];
view.slide = view.getElementsByClassName("slide")[0];

view.slide.children[0].classList.add("active");

view.prev_button = view.getElementsByClassName("prev-button")[0];
view.next_button = view.getElementsByClassName("next-button")[0];

view.number = view.slide.children.length;
view.current_index = 0;

view.prev = function() {
    if (view.current_index == 0) {
        view.current_index = view.number - 1;
    } else {
        view.current_index--;
    }
    
    slideshow.setActiveClass();
};

view.next = function() {
    if (view.current_index == view.number - 1) {
        view.current_index = 0;
    } else {
        view.current_index++;
    }
    
    slideshow.setActiveClass();
};

view.prev_button.addEventListener("click", view.prev);
view.next_button.addEventListener("click", view.next);

var preview = view.cloneNode(true);
preview.classList.remove("view");
preview.classList.add("preview");
slideshow.appendChild(preview);

preview.options = <?= json_encode($preview_options) ?>;

preview.slide = preview.getElementsByClassName("slide")[0];

for (var i = 0; i < view.number; i++) {
    preview.slide.children[i].style.width =
        "calc(100% / " + preview.options.items_per_page + " - 5px * "
        + (preview.options.items_per_page - 1) / preview.options.items_per_page + ")";
}

preview.prev_button = preview.getElementsByClassName("prev-button")[0];
preview.next_button = preview.getElementsByClassName("next-button")[0];

preview.pages_count = 1 + Math.floor(preview.scrollWidth / preview.offsetWidth);
preview.current_page = 0;

preview.pages = [];
for (var i = 0; i < preview.pages_count - 1; i++) {
    preview.pages.push(i * preview.offsetWidth);
}
if (preview.scrollWidth / preview.offsetWidth > preview.pages_count - 1) {
    preview.pages.push(preview.scrollWidth - preview.offsetWidth);
}

preview.setMargin = function(){
    preview.slide.style.marginLeft = "-" + preview.pages[preview.current_page] + "px";
    preview.slide.style.marginRight = preview.pages[preview.current_page] + "px";
};

preview.prev = function() {
    if (preview.current_page == 0) {
        preview.current_page = preview.pages_count - 1;
    } else {
        preview.current_page--;
    }
    
    preview.setMargin();
};

preview.next = function() {
    if (preview.current_page == preview.pages_count - 1) {
        preview.current_page = 0;
    } else {
        preview.current_page++;
    }
    
    preview.setMargin();
};

preview.prev_button.addEventListener("click", preview.prev);
preview.next_button.addEventListener("click", preview.next);

for (var i = 0; i < view.number; i++) {
   (function(index) {
        preview.slide.children[index].addEventListener("click", function(){
            view.current_index = index;
            slideshow.setActiveClass();
         });
   })(i);
}

slideshow.setActiveClass = function(){
    for (var i = 0; i < view.number; i++) {
        if (i == view.current_index) {
            view.slide.children[i].classList.add("active");
            preview.slide.children[i].classList.add("active");
        } else {
            view.slide.children[i].classList.remove("active");
            preview.slide.children[i].classList.remove("active");
        }
    }
};


slideshow.autorun = setInterval(view.next, 4000);
slideshow.onmouseout = function(){
    slideshow.autorun = setInterval(view.next, 4000);
};
slideshow.onmouseover = function(){
    clearInterval(slideshow.autorun);
};
slideshow.autorun;

</script>