 $(function(){
      $('.crsl-items').carousel({
        visible: 3,
        itemMinWidth: 180,
        itemEqualHeight: 370,
        itemMargin: 9,
      });

      $("a[href=#]").on('click', function(e) {
        e.preventDefault();
      });
    });
