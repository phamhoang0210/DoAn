        $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

       jQuery(document).ready(function ($) {
  // Banner  Gốc đầu tiên
            var jssor_1_options = {
              $AutoPlay: true,
                $SlideDuration: 160, 
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 5,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
                 function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);          
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            // end Banner  Gốc đầu tiên

              // Banner  gốc đầu tiên đã co
      var jssor_2_options = {
              $AutoPlay: false,
                $SlideDuration: 160, 
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 5,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
              }
            };

            var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);
                 function ScaleSliderco() {
                var refSize = jssor_2_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);          
                    jssor_2_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSliderco, 30);
                }
            }
            ScaleSliderco();
            $(window).bind("load", ScaleSliderco);
            $(window).bind("resize", ScaleSliderco);
            $(window).bind("orientationchange", ScaleSliderco);
   
              //End Banner  gốc đầu tiên đã co
              // Banner Live Show
   var jssor_liveshow_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 1, 
                $SlideDuration: 160,    
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 3,
                $SpacingY: 3
              }
            };
            var jssor_liveshow_slider = new $JssorSlider$("jssor_live", jssor_liveshow_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider_liveShow() {
                var refSize = jssor_liveshow_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);
                    jssor_liveshow_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider_liveShow, 30);
                }
            }
            ScaleSlider_liveShow();
            $(window).bind("load", ScaleSlider_liveShow);
            $(window).bind("resize", ScaleSlider_liveShow);
            $(window).bind("orientationchange", ScaleSlider_liveShow);
              //End Banner  Live Show
            // Banner  bảng xếp hạng
                  
var jssor_top_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 1, 
                $SlideDuration: 160,    
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 3,
                $SpacingY: 3
              }
            };
            var jssor_top_slider=new $JssorSlider$("jssor_top", jssor_top_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider_top() {
                var refSize = jssor_top_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);
                    jssor_top_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider_top, 30);
                }
            }
            ScaleSlider_liveShow();
            $(window).bind("load", ScaleSlider_top);
            $(window).bind("resize", ScaleSlider_top);
            $(window).bind("orientationchange", ScaleSlider_top);
 
              //End Banner  bảng xếp hạng
            // Banner phim tuổi thanh xuân phần 1
   var jssor_dacsac_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 1, 
                $SlideDuration: 160,    
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 3,
                $SpacingY: 3
              }
            };
            var jssor_dacsac_slider=new $JssorSlider$("jssor_phim_dacsac", jssor_dacsac_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider_dacsac() {
                var refSize = jssor_dacsac_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);
                    jssor_dacsac_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider_dacsac, 30);
                }
            }
            ScaleSlider_liveShow();
            $(window).bind("load", ScaleSlider_dacsac);
            $(window).bind("resize", ScaleSlider_dacsac);
            $(window).bind("orientationchange", ScaleSlider_dacsac);
              //End Banner  phim tuổi thanh xuân phần 1
             
              // Banner Video Hài Hước Nổi Bật
   var jssor_haihuoc_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 1, 
                $SlideDuration: 160,    
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 3,
                $SpacingY: 3
              }
            };
            var jssor_haihuoc_slider=new $JssorSlider$("jssor_haihuoc", jssor_haihuoc_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider_haihuoc() {
                var refSize = jssor_haihuoc_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);
                    jssor_haihuoc_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider_haihuoc, 30);
                }
            }
            ScaleSlider_liveShow();
            $(window).bind("load", ScaleSlider_haihuoc);
            $(window).bind("resize", ScaleSlider_haihuoc);
            $(window).bind("orientationchange", ScaleSlider_haihuoc);
              //End Banner Video Hài Hước Nổi Bật
             

              // Banner TV Show
   var jssor_tvshow_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 1, 
                $SlideDuration: 160,    
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 3,
                $SpacingY: 3
              }
            };
            var jssor_tvshow_slider=new $JssorSlider$("jssor_tvshow", jssor_tvshow_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider_tvshow() {
                var refSize = jssor_tvshow_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);
                    jssor_tvshow_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider_haihuoc, 30);
                }
            }
            ScaleSlider_tvshow();
            $(window).bind("load", ScaleSlider_tvshow);
            $(window).bind("resize", ScaleSlider_tvshow);
            $(window).bind("orientationchange", ScaleSlider_tvshow);
              //End Banner TV Show
                           // Banner Hoạt Hình
   var jssor_hoathinh_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 1, 
                $SlideDuration: 160,    
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 3,
                $SpacingY: 3
              }
            };
            var jssor_hoathinh_slider=new $JssorSlider$("jssor_hoathinh", jssor_hoathinh_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider_hoathinh() {
                var refSize = jssor_hoathinh_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);
                    jssor_hoathinh_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider_hoathinh, 30);
                }
            }
            ScaleSlider_hoathinh();
            $(window).bind("load", ScaleSlider_hoathinh);
            $(window).bind("resize", ScaleSlider_hoathinh);
            $(window).bind("orientationchange", ScaleSlider_hoathinh);
              //End Banner Hoạt Hình
           // Banner Phim Việt Nam Đặc Sắc
   var jssor_vietnam_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 1, 
                $SlideDuration: 160,    
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 3,
                $SpacingY: 3
              }
            };
            var jssor_vietnam_slider=new $JssorSlider$("jssor_phim_vn_dacsac", jssor_vietnam_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider_vietnam() {
                var refSize = jssor_vietnam_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);
                    jssor_vietnam_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider_vietnam, 30);
                }
            }
            ScaleSlider_vietnam();
            $(window).bind("load", ScaleSlider_vietnam);
            $(window).bind("resize", ScaleSlider_vietnam);
            $(window).bind("orientationchange", ScaleSlider_vietnam);
              //End Banner Phim Việt Nam Đặc Sắc
                       // Banner Phim Truyền Hình
   var jssor_truyenhinh_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 1, 
                $SlideDuration: 160,    
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 3,
                $SpacingY: 3
              }
            };
            var jssor_truyenhinh_slider=new $JssorSlider$("jssor_truyenhinh", jssor_truyenhinh_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider_truyenhinh() {
                var refSize = jssor_truyenhinh_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1400);
                    jssor_truyenhinh_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider_truyenhinh, 30);
                }
            }
            ScaleSlider_truyenhinh();
            $(window).bind("load", ScaleSlider_truyenhinh);
            $(window).bind("resize", ScaleSlider_truyenhinh);
            $(window).bind("orientationchange", ScaleSlider_truyenhinh);
              //End Banner Phim Truyền Hình
 
            /*responsive code end*/
        });