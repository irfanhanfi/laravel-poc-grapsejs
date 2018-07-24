<?php 
$categories = [
  [
    'id' => 1,
    'title' => 'Electronics',
    'image' => '/images/subcat/electronics.png',
    'child' => [
      [
        'id' => 2,
        'title' => 'CAMERAS & CAMCORDERS',
        'image' => '/images/subcat/cameras.png',
      ],[
        'id' => 3,
        'title' => 'COMPUTERS & TABLETS',
        'image' => '/images/subcat/computers.png',
      ],[
        'id' => 4,
        'title' => 'TV, AUDIO & SURVEILLANCE',
        'image' => '/images/subcat/tv.jpeg',
      ],[
        'id' => 5,
        'title' => 'CELL PHONES & ACCESSORIES',
        'image' => '/images/subcat/cell_phones.png',
      ],
    ]
  ],[
    'id' => 6,
    'title' => 'Clothing',
    'image' => '/images/subcat/clothing.jpeg',
    'child' => [
      [
        'id' => 7,
        'title' => 'Trousers and shorts',
        'image' => '/images/subcat/trousers.jpg',
      ],[
        'id' => 8,
        'title' => 'Sports',
        'image' => '/images/subcat/sports.jpg',
      ],[
        'id' => 9,
        'title' => 'Saries',
        'image' => '/images/subcat/saries.jpg',
      ],[
        'id' => 10,
        'title' => 'Shirts & T-Shirts',
        'image' => '/images/subcat/shirt-header.jpg',
      ],
    ]
  ],[
    'id' => 11,
    'title' => 'Footwear',
    'image' => '/images/subcat/footwear.jpg',
    'child' => [
      [
        'id' => 12,
        'title' => 'Sandals‎',
        'image' => '/images/subcat/sandals‎.jpg',
      ],[
        'id' => 14,
        'title' => 'Sleeper',
        'image' => '/images/subcat/sleeper.JPG',
      ],[
        'id' => 15,
        'title' => 'Shoes',
        'image' => '/images/subcat/shoes.jpg',
      ],
    ]
  ],
];
$childCats = [];
$first = true;
?>
<div id="categoires-popup" style="display:none">
    <div class="categoires-popup-label row">
        @foreach($categories as $category)
          <?php
          $class = "col-md-4 category-item";
          if($category['child']){
            $childCats[$category['id']] = $category['child'];
          }
          if ($first){
             $class .= " active";
             $first = false;
          }
          ?>
          <div class="{{ $class }}">
              <div class="card">
                  <a class="prod-img-link" href="javascript:void(0)" data-catid="{{ $category['id'] }}">
                    <!-- <img class="card-img-top" src="{{ $category['image'] }}" alt="Card image cap"> -->
                    <div class="card-body">
                        <p class="card-title">{{ $category['title'] }}</p>
                    </div>
                  </a>
              </div>
          </div>
        @endforeach
    </div>
    @if($childCats)
       <?php $first = true;?>
        @foreach($childCats as $catid => $ccats)
          <?php 
          $class = 'sub-categoires row catof-' . $catid;
          if ($first){
             $class .= " active";
             $first = false;
          }else{
            $class .= " d-none"; 
          }
          ?>
          
          <div class="{{ $class }}">
          @foreach($ccats as $childcat)
            <div class="col-md-4 category-child-item subcatof-{{ $childcat['id'] }}">
              <div class="card">
                  <a class="prod-img-link" href="javascript:void(0)">
                    <img class="card-img-top" src="{{ $childcat['image'] }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title">{{ $childcat['title'] }}</p>
                    </div>
                  </a>
              </div>
            </div>
          @endforeach
          </div>
        @endforeach
      @endif
</div>
<style type="text/css">
img.card-img-top {
  max-height: 150px;
}
.category-child-item {
    margin-top: 10px;
}
a.prod-img-link {
    color: gray;
    font-weight: bold;
    text-align: center;
    text-transform: uppercase;
    font-size: 13px;
}
p.card-title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.gjs-mdl-backlayer {
    opacity: .8;
}
.category-modal-popup .gjs-mdl-btn-close{
  display: none;
}
.category-modal-popup .row {
    margin-right: 0;
    margin-left: 0;
}
.category-modal-popup div#gjs-mdl-c {
    max-height: 500px;
    overflow-x: hidden;
}
.col-md-4.category-item.active .card {
    background-color: grey;
}
.col-md-4.category-item.active .card a{
    color: white;
}
p.card-title {
    margin-bottom: 0;
}
</style>
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
  $('a.prod-img-link', '.category-item').on('click', function(){
    var catId = $(this).data('catid');
    if($('.sub-categoires.catof-' + catId).hasClass('d-none')){
      $(this).parents('.categoires-popup-label').find('.category-item').removeClass('active');
      $(this).parents('.category-item').addClass('active');
      $('.sub-categoires').addClass('d-none');
      $('.sub-categoires.catof-' + catId).removeClass('d-none').hide().fadeIn();
    }
  });
  $('a.prod-img-link', '.category-child-item').on('click', function(){
    var subCatId = $(this).data('subcatof');
    var catId    = $(this).parents('.sub-categoires').data('catid');
    var catTitle = $(this).find('.card-title').text();
    var blockManager = window.editor.BlockManager;
        blockManager.add('my-first-block', {
          label:` 
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 96 96" style="enable-background:new 0 0 96 96;" xml:space="preserve" >
<g id="XMLID_5_">
  <path id="XMLID_9_" fill="#dddddd" class="st0" d="M69.7,50.9c0.1-0.9,0.2-1.9,0.2-2.9s-0.1-1.9-0.2-2.9l6.2-4.8c0.6-0.4,0.7-1.2,0.4-1.9
    l-5.8-10.1c-0.4-0.6-1.1-0.9-1.8-0.6l-7.3,2.9c-1.5-1.2-3.2-2.1-4.9-2.9l-1.1-7.7c-0.1-0.7-0.7-1.2-1.4-1.2H42.2
    c-0.7,0-1.3,0.5-1.4,1.2l-1.1,7.7c-1.8,0.7-3.4,1.7-4.9,2.9l-7.3-2.9c-0.7-0.3-1.4,0-1.8,0.6l-5.8,10.1c-0.4,0.6-0.2,1.4,0.4,1.9
    l6.2,4.8c-0.1,0.9-0.2,1.9-0.2,2.9s0.1,1.9,0.2,2.9l-6.2,4.8c-0.6,0.4-0.7,1.2-0.4,1.9l5.8,10.1c0.3,0.6,1.1,0.9,1.8,0.6l7.3-2.9
    c1.5,1.2,3.2,2.1,4.9,2.9l1.1,7.7c0.1,0.7,0.7,1.2,1.4,1.2h11.7c0.7,0,1.3-0.5,1.4-1.2l1.1-7.7c1.8-0.7,3.4-1.7,4.9-2.9l7.3,2.9
    c0.7,0.3,1.4,0,1.8-0.6l5.8-10.1c0.3-0.6,0.2-1.4-0.4-1.9L69.7,50.9z M48,58.2c-5.6,0-10.2-4.6-10.2-10.2S42.4,37.8,48,37.8
    S58.2,42.4,58.2,48S53.6,58.2,48,58.2z"/>
</g>
</svg>
<div class="gjs-block-label"> Product </div>`,
          content: '<div class="my-block">This block is for ' + catTitle +' product setting.</div>',
        });
    editor.Modal.close();
  });
});
</script>