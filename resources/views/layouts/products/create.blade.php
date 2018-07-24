@extends('layouts.products.base')
<?php
$product_id = 0;
$html = '<div id="imubm" class="row">
  <div id="izzum" class="cell">
    <img src="/images/sampleimage.jpg" class="c4350"/>
  </div>
  <div id="i967h" class="cell">
    <div class="row">
      <div class="cell">
        <div class="c4425">Product Title..
        </div>
      </div>
    </div>
    <div class="row">
      <div class="cell">
        <div class="c4583">product description....
        </div>
      </div>
    </div>
  </div>
</div>';
$css = '* {
  box-sizing: border-box;
}
body {
  margin: 0;
}
*{
  box-sizing:border-box;
}
body{
  margin-top:0px;
  margin-right:0px;
  margin-bottom:0px;
  margin-left:0px;
}
*{
  box-sizing:border-box;
}
body{
  margin-top:0px;
  margin-right:0px;
  margin-bottom:0px;
  margin-left:0px;
}
.row{
  display:flex;
  justify-content:flex-start;
  align-items:stretch;
  flex-wrap:nowrap;
  padding-top:10px;
  padding-right:10px;
  padding-bottom:10px;
  padding-left:10px;
}
.cell{
  min-height:75px;
  flex-grow:1;
  flex-basis:100%;
}
.c4350{
  color:rgb(0, 0, 0);
  float:none;
  max-width:400px;
}
.c4425{
  font-family:Verdana, Geneva, sans-serif;
  font-size:25px;
  font-weight:700;
  color:rgb(255, 255, 255);
  text-align:center;
  position:static;
  padding-top:10px;
  padding-right:10px;
  padding-bottom:10px;
  padding-left:10px;
}
.c4583{
  color:rgb(255, 255, 255);
  padding-top:10px;
  padding-right:10px;
  padding-bottom:10px;
  padding-left:10px;
}
*{
  box-sizing:border-box;
}
body{
  margin-top:0px;
  margin-right:0px;
  margin-bottom:0px;
  margin-left:0px;
  background-image:url("/images/bg-gr-v.png");
  background-repeat-x:repeat;
  background-repeat-y:repeat;
  background-position-x:0%;
  background-position-y:0%;
  background-attachment:scroll;
  background-size:auto;
}
#imubm{
  color:rgb(244, 244, 244);
}
#izzum{
  text-align:center;
}
#i967h{
  color:rgb(255, 98, 98);
}
@media (max-width: 768px){
  .row{
    flex-wrap:wrap;
  }
}
';
if (isset($product)){
    $product_id = $product->id;
    $html = $product->html;
    $css  = $product->css;
}
?>
@section('content')
<h5 class="card-header">Create Product</h5>
<div id="gjs">
    {!! $html !!}
</div>
<input type="hidden" name="id" id="product_id" value="{{ $product_id }}" />
<style type="text/css">
    body,
    html {
      height: 100%;
      margin: 0;
      overflow-x: hidden;
    }
    #gjs-sm-float, .gjs-pn-views .fa-cog {
        display: none;
    }
    .gjs-pn-views .gjs-pn-btn {
        margin: 0;
        height: 40px;
        padding: 10px;
        width: 33.3333%;
    }
    .gjs-pn-views {
        padding: 0;
    }
</style>
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
    var lp = '/images/';
    var plp = 'http://placehold.it/350x250/';
    var images = [
        lp + 'team1.jpg', 
        lp + 'team2.jpg', 
        lp + 'team3.jpg', 
        plp + '78c5d6/fff/image1.jpg', 
        plp + '459ba8/fff/image2.jpg', 
        plp + '79c267/fff/image3.jpg',
        plp + 'c5d647/fff/image4.jpg', 
        plp + 'f28c33/fff/image5.jpg', 
        plp + 'e868a2/fff/image6.jpg', 
        plp + 'cc4360/fff/image7.jpg',
        lp + 'work-desk.jpg', 
        lp + 'phone-app.png', 
        lp + 'bg-gr-v.png',
        lp + 'smsgs9.png'
    ];
    var product_id = $('#product_id').val()
    window.editor = grapesjs.init({
         storageManager: {
            //type: 'none',
            autosave: false,
            //setStepsBeforeSave: 2,
            type: 'remote',
            urlStore: '/products/create',
            // urlLoad: '/app/load_gjs_data/',
            params: {
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        },
        style:`
    {!! $css !!}
`,
        height: '100%',
        container: '#gjs',
        fromElement: 1,
        showOffsets: 1,
        // assetManager: {
        //     embedAsBase64: 1,
        //     assets: images
        // },
        assetManager: {
            assets: images,
            upload: '/products/images/upload',
            uploadText: 'Upload image..',
            uploadName: 'images',
            params: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            headers:{
                // 'Content-Type': 'x-www-form-urlencoded',
            }
        },
        styleManager: { clearProperties: 1 },
        plugins: ['gjs-preset-webpage', 'grapesjs-lory-slider', 'grapesjs-tabs'],
        pluginsOpts: {
            'grapesjs-lory-slider': {
                sliderBlock: {
                    category: 'Extra'
                }
            },
            'grapesjs-tabs': {
                tabsBlock: {
                    category: 'Extra'
                }
            },
            'gjs-preset-webpage': {
                modalImportTitle: 'Import Template',
                modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
                modalImportContent: function(editor) {
                    return editor.getHtml() + '<style>' + editor.getCss() + '</style>'
                },
                // filestackOpts: { key: 'AYmqZc2e8RLGLE7TGkX3Hz' },
                aviaryOpts: { key: '1' },
                blocksBasicOpts: { flexGrid: 1 },
                customStyleManager: [{
                    name: 'General',
                    buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
                    properties: [{
                            name: 'Alignment',
                            property: 'float',
                            type: 'radio',
                            defaults: 'none',
                            list: [
                                { value: 'none', className: 'fa fa-times' },
                                { value: 'left', className: 'fa fa-align-left' },
                                { value: 'right', className: 'fa fa-align-right' }
                            ],
                        },
                        { property: 'position', type: 'select' }
                    ],
                }, {
                    name: 'Dimension',
                    open: false,
                    buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
                    properties: [{
                        id: 'flex-width',
                        type: 'integer',
                        name: 'Width',
                        units: ['px', '%'],
                        property: 'flex-basis',
                        toRequire: 1,
                    }, {
                        property: 'margin',
                        properties: [
                            { name: 'Top', property: 'margin-top' },
                            { name: 'Right', property: 'margin-right' },
                            { name: 'Bottom', property: 'margin-bottom' },
                            { name: 'Left', property: 'margin-left' }
                        ],
                    }, {
                        property: 'padding',
                        properties: [
                            { name: 'Top', property: 'padding-top' },
                            { name: 'Right', property: 'padding-right' },
                            { name: 'Bottom', property: 'padding-bottom' },
                            { name: 'Left', property: 'padding-left' }
                        ],
                    }],
                }, {
                    name: 'Typography',
                    open: false,
                    buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-decoration', 'text-shadow'],
                    properties: [
                        { name: 'Font', property: 'font-family' },
                        { name: 'Weight', property: 'font-weight' },
                        { name: 'Font color', property: 'color' },
                        {
                            property: 'text-align',
                            type: 'radio',
                            defaults: 'left',
                            list: [
                                { value: 'left', name: 'Left', className: 'fa fa-align-left' },
                                { value: 'center', name: 'Center', className: 'fa fa-align-center' },
                                { value: 'right', name: 'Right', className: 'fa fa-align-right' },
                                { value: 'justify', name: 'Justify', className: 'fa fa-align-justify' }
                            ],
                        }, {
                            property: 'text-decoration',
                            type: 'radio',
                            defaults: 'none',
                            list: [
                                { value: 'none', name: 'None', className: 'fa fa-times' },
                                { value: 'underline', name: 'underline', className: 'fa fa-underline' },
                                { value: 'line-through', name: 'Line-through', className: 'fa fa-strikethrough' }
                            ],
                        }, {
                            property: 'text-shadow',
                            properties: [
                                { name: 'X position', property: 'text-shadow-h' },
                                { name: 'Y position', property: 'text-shadow-v' },
                                { name: 'Blur', property: 'text-shadow-blur' },
                                { name: 'Color', property: 'text-shadow-color' }
                            ],
                        }
                    ],
                }, {
                    name: 'Decorations',
                    open: false,
                    buildProps: ['opacity', 'background-color', 'border-radius', 'border', 'box-shadow', 'background'],
                    properties: [{
                        type: 'slider',
                        property: 'opacity',
                        defaults: 1,
                        step: 0.01,
                        max: 1,
                        min: 0,
                    }, {
                        property: 'border-radius',
                        properties: [
                            { name: 'Top', property: 'border-top-left-radius' },
                            { name: 'Right', property: 'border-top-right-radius' },
                            { name: 'Bottom', property: 'border-bottom-left-radius' },
                            { name: 'Left', property: 'border-bottom-right-radius' }
                        ],
                    }, {
                        property: 'box-shadow',
                        properties: [
                            { name: 'X position', property: 'box-shadow-h' },
                            { name: 'Y position', property: 'box-shadow-v' },
                            { name: 'Blur', property: 'box-shadow-blur' },
                            { name: 'Spread', property: 'box-shadow-spread' },
                            { name: 'Color', property: 'box-shadow-color' },
                            { name: 'Shadow type', property: 'box-shadow-type' }
                        ],
                    }, {
                        property: 'background',
                        properties: [
                            { name: 'Image', property: 'background-image' },
                            { name: 'Repeat', property: 'background-repeat' },
                            { name: 'Position', property: 'background-position' },
                            { name: 'Attachment', property: 'background-attachment' },
                            { name: 'Size', property: 'background-size' }
                        ],
                    }, ],
                }, {
                    name: 'Extra',
                    open: false,
                    buildProps: ['transition', 'perspective', 'transform'],
                    properties: [{
                        property: 'transition',
                        properties: [
                            { name: 'Property', property: 'transition-property' },
                            { name: 'Duration', property: 'transition-duration' },
                            { name: 'Easing', property: 'transition-timing-function' }
                        ],
                    }, {
                        property: 'transform',
                        properties: [
                            { name: 'Rotate X', property: 'transform-rotate-x' },
                            { name: 'Rotate Y', property: 'transform-rotate-y' },
                            { name: 'Rotate Z', property: 'transform-rotate-z' },
                            { name: 'Scale X', property: 'transform-scale-x' },
                            { name: 'Scale Y', property: 'transform-scale-y' },
                            { name: 'Scale Z', property: 'transform-scale-z' }
                        ],
                    }]
                }, {
                    name: 'Flex',
                    open: false,
                    properties: [{
                        name: 'Flex Container',
                        property: 'display',
                        type: 'select',
                        defaults: 'block',
                        list: [
                            { value: 'block', name: 'Disable' },
                            { value: 'flex', name: 'Enable' }
                        ],
                    }, {
                        name: 'Flex Parent',
                        property: 'label-parent-flex',
                        type: 'integer',
                    }, {
                        name: 'Direction',
                        property: 'flex-direction',
                        type: 'radio',
                        defaults: 'row',
                        list: [{
                            value: 'row',
                            name: 'Row',
                            className: 'icons-flex icon-dir-row',
                            title: 'Row',
                        }, {
                            value: 'row-reverse',
                            name: 'Row reverse',
                            className: 'icons-flex icon-dir-row-rev',
                            title: 'Row reverse',
                        }, {
                            value: 'column',
                            name: 'Column',
                            title: 'Column',
                            className: 'icons-flex icon-dir-col',
                        }, {
                            value: 'column-reverse',
                            name: 'Column reverse',
                            title: 'Column reverse',
                            className: 'icons-flex icon-dir-col-rev',
                        }],
                    }, {
                        name: 'Justify',
                        property: 'justify-content',
                        type: 'radio',
                        defaults: 'flex-start',
                        list: [{
                            value: 'flex-start',
                            className: 'icons-flex icon-just-start',
                            title: 'Start',
                        }, {
                            value: 'flex-end',
                            title: 'End',
                            className: 'icons-flex icon-just-end',
                        }, {
                            value: 'space-between',
                            title: 'Space between',
                            className: 'icons-flex icon-just-sp-bet',
                        }, {
                            value: 'space-around',
                            title: 'Space around',
                            className: 'icons-flex icon-just-sp-ar',
                        }, {
                            value: 'center',
                            title: 'Center',
                            className: 'icons-flex icon-just-sp-cent',
                        }],
                    }, {
                        name: 'Align',
                        property: 'align-items',
                        type: 'radio',
                        defaults: 'center',
                        list: [{
                            value: 'flex-start',
                            title: 'Start',
                            className: 'icons-flex icon-al-start',
                        }, {
                            value: 'flex-end',
                            title: 'End',
                            className: 'icons-flex icon-al-end',
                        }, {
                            value: 'stretch',
                            title: 'Stretch',
                            className: 'icons-flex icon-al-str',
                        }, {
                            value: 'center',
                            title: 'Center',
                            className: 'icons-flex icon-al-center',
                        }],
                    }, {
                        name: 'Flex Children',
                        property: 'label-parent-flex',
                        type: 'integer',
                    }, {
                        name: 'Order',
                        property: 'order',
                        type: 'integer',
                        defaults: 0,
                        min: 0
                    }, {
                        name: 'Flex',
                        property: 'flex',
                        type: 'composite',
                        properties: [{
                            name: 'Grow',
                            property: 'flex-grow',
                            type: 'integer',
                            defaults: 0,
                            min: 0
                        }, {
                            name: 'Shrink',
                            property: 'flex-shrink',
                            type: 'integer',
                            defaults: 0,
                            min: 0
                        }, {
                            name: 'Basis',
                            property: 'flex-basis',
                            type: 'integer',
                            units: ['px', '%', ''],
                            unit: '',
                            defaults: 'auto',
                        }],
                    }, {
                        name: 'Align',
                        property: 'align-self',
                        type: 'radio',
                        defaults: 'auto',
                        list: [{
                            value: 'auto',
                            name: 'Auto',
                        }, {
                            value: 'flex-start',
                            title: 'Start',
                            className: 'icons-flex icon-al-start',
                        }, {
                            value: 'flex-end',
                            title: 'End',
                            className: 'icons-flex icon-al-end',
                        }, {
                            value: 'stretch',
                            title: 'Stretch',
                            className: 'icons-flex icon-al-str',
                        }, {
                            value: 'center',
                            title: 'Center',
                            className: 'icons-flex icon-al-center',
                        }],
                    }]
                }],
            },
        },

    });


    var pn = editor.Panels;
    var modal = editor.Modal;
    editor.Commands.add('canvas-clear', function() {
        if (confirm('Areeee you sure to clean the canvas?')) {
            var comps = editor.DomComponents.clear();
            setTimeout(function() { localStorage.clear() }, 0)
        }
    });


    // Add info command
    var cmdm = editor.Commands;
    var mdlClass = 'gjs-mdl-dialog-sm category-modal-popup';
    var infoContainer = document.getElementById('categoires-popup');
    cmdm.add('open-info', function() {
      var mdlDialog = document.querySelector('.gjs-mdl-dialog');
      mdlDialog.className += ' ' + mdlClass;
      infoContainer.style.display = 'block';
      modal.setTitle('Select Category');
      modal.setContent(infoContainer);
      modal.open();
      modal.getModel().once('change:open', function() {
        mdlDialog.className = mdlDialog.className.replace(mdlClass, '');
      })
    });
    
    @if(!$product_id)
    editor.runCommand('open-info') 
    @endif

    pn.addButton('options', {
      id: 'open-info',
      className: 'fa fa-question-circle d-none',
      command: function() { 
        editor.runCommand('open-info') 
    },
      attributes: {
        'title': 'About',
        'data-tooltip-pos': 'bottom',
      },
    });

    // Add Save Button
    cmdm.add('save-content', {
        run:  function(editor, sender){
            editor.StorageManager.getConfig().params.id =  $('#product_id').val();
            // editor.StorageManager.getConfig().params.css =  editor.getCss();
            editor.store(onAfterContentStore);
        },
        stop:  function(editor, sender){
            console.log('save-content-stop', editor, sender);
        },
    })

    function onAfterContentStore( data ) {
        data = JSON.parse(data);
        if(product_id = data['id']){
            $('#product_id').val(product_id);
        }
        toastr.success('Product saved successfully!')
    }

    pn.addButton('options', {
      id: 'save-content',
      className: 'fa fa-save',
      command: function() { 
            editor.runCommand('save-content') 
        },
      attributes: {
        'title': 'Save',
        'data-tooltip-pos': 'bottom',
      },
    });

    // Simple warn notifier
    var origWarn = console.warn;
    toastr.options = {
        closeButton: true,
        preventDuplicates: true,
        showDuration: 250,
        hideDuration: 150
    };
    console.warn = function(msg) {
        if (msg.indexOf('[undefined]') == -1) {
            toastr.warning(msg);
        }
        origWarn(msg);
    };


    // Add and beautify tooltips
    [
        ['sw-visibility', 'Show Borders'],
        ['preview', 'Preview'],
        ['fullscreen', 'Fullscreen'],
        ['export-template', 'Export'],
        ['undo', 'Undo'],
        ['redo', 'Redo'],
        ['gjs-open-import-webpage', 'Import'],
        ['canvas-clear', 'Clear canvas']
    ]
    .forEach(function(item) {
        pn.getButton('options', item[0]).set('attributes', { title: item[1], 'data-tooltip-pos': 'bottom' });
    });
    [
        ['open-sm', 'Style Manager'],
        ['open-layers', 'Layers'],
        ['open-blocks', 'Blocks']
    ]
    .forEach(function(item) {
        pn.getButton('views', item[0]).set('attributes', { title: item[1], 'data-tooltip-pos': 'bottom' });
    });
    var titles = document.querySelectorAll('*[title]');

    for (var i = 0; i < titles.length; i++) {
        var el = titles[i];
        var title = el.getAttribute('title');
        title = title ? title.trim() : '';
        if (!title)
            break;
        el.setAttribute('data-tooltip', title);
        el.setAttribute('title', '');
    }

    // Show borders by default
    pn.getButton('options', 'sw-visibility').set('active', 1);

    // Store and load events
    // editor.on('storage:load', function(e) { console.log('Loaded ', e) });
    // editor.on('storage:store', function(e) { console.log('Stored ', e) });

    // Do stuff on load
    editor.on('load', function() {
        var $ = grapesjs.$;

        // Show logo with the version
        // var logoCont = document.querySelector('.gjs-logo-cont');
        // document.querySelector('.gjs-logo-version').innerHTML = 'v' + grapesjs.version;
        // var logoPanel = document.querySelector('.gjs-pn-commands');
        // logoPanel.appendChild(logoCont);


        // Load and show settings and style manager
        var openTmBtn = pn.getButton('views', 'open-tm');
        openTmBtn && openTmBtn.set('active', 1);
        var openSm = pn.getButton('views', 'open-sm');
        openSm && openSm.set('active', 1);

        // Add Settings Sector
        var traitsSector = $('<div class="gjs-sm-sector no-select">' +
            '<div class="gjs-sm-title"><span class="icon-settings fa fa-cog"></span> Settings</div>' +
            '<div class="gjs-sm-properties" style="display: none;"></div></div>');
        var traitsProps = traitsSector.find('.gjs-sm-properties');
        traitsProps.append($('.gjs-trt-traits'));
        $('.gjs-sm-sectors').before(traitsSector);
        traitsSector.find('.gjs-sm-title').on('click', function() {
            var traitStyle = traitsProps.get(0).style;
            var hidden = traitStyle.display == 'none';
            if (hidden) {
                traitStyle.display = 'block';
            } else {
                traitStyle.display = 'none';
            }
        });

        // Open block manager
        var openBlocksBtn = editor.Panels.getButton('views', 'open-blocks');
        openBlocksBtn && openBlocksBtn.set('active', 1);
    });

});
</script>
@endsection
@include('layouts.products.categories_popup')
