<section>
    <article class="feedBox mainSmooth">
      <div class="feedContainer">
        <div class="feedContent">
          <h3>Title</h3>
          <div class="feedButtonContainer"></div>
          <ul class="list-inline feedExtras">
            <li class="">
              <a class="mainSmooth showDesc">show description</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="descContainer">
        <div>Description Text</div>
      </div>
    </article>
    <article class="feedBox mainSmooth">
      <div class="feedContainer">
        <div class="feedContent">
          <h3>Title</h3>
          <div class="feedButtonContainer"></div>
          <ul class="list-inline feedExtras">
            <li class="">
              <a class="mainSmooth showDesc">show description</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="descContainer">
        <div>Description Text</div>
      </div>
    </article>
  </section>
  $(".showDesc").click(function() {
  var $target = $(this).closest('.feedContainer').next(".descContainer").toggleClass("show");
  $(".descContainer").not($target).removeClass('show'); // hide other open elements
});