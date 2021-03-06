var Utils = {
   isSamePassword : function (form) {
      var bRes = false;
      if(form.typePass.value !=form.retypePass.value && form.retypePass.value != ''){
         $('#control-group-repass,#control-group-pass').addClass('error');
         $('form#subscription button[type=submit]').attr('disabled','disabled');
         if($('#control-group-pass > div.controls > span').length==0){
            $('<span/>',{
               id:'pass',
               class:'help-block',
               text:"Les mots de passes saisis ne sont pas identiques."
            }).appendTo('#control-group-pass > div.controls');
        }
      }
      else{
         bRes = true;
         $('#control-group-repass,#control-group-pass').removeClass('error');
         $('form#subscription button[type=submit]').removeAttr('disabled');
         $('span#pass').remove();
      }

      return bRes;
   },

   isValidEmail : function (form){
      var bRes = false;
      var validEmail = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i;
      if (!validEmail.test(form.email.value)){
         $('#control-group-courriel').addClass('error');
         $('form#subscription button[type=submit]').attr('disabled','disabled');
         if($('#control-group-courriel > div.controls > span').length==0 ){
            $('<span/>',{
               id:'courriel',
               class:'help-block',
               text:"Le courriel n'est pas valide."
            }).appendTo('#control-group-courriel > div.controls');
         }
      }
      else{
         bRes = true;
         $('#control-group-courriel').removeClass('error');
         $('form#subscription button[type=submit]').removeAttr('disabled');
         $('span#courriel').remove();
      }
      return bRes;

   },

   isValidUsername : function(form){
      var bRes=false;
      var invalidName = /[\s]/;
      if (invalidName.test(form.username.value)){
         $('#control-group-username').addClass('error');
         $('form#subscription button[type=submit]').attr('disabled','disabled');
         if($('#control-group-username > div.controls > span').length==0 ){
            $('<span/>',{
               id: 'username',
               class:'help-block',
               text:"Le nom d'utilisateur ne peut pas contenir d'espace."
            }).appendTo('#control-group-username > div.controls');
         }
      }
      else{
         bRes = true;
         $('#control-group-username').removeClass('error');
         $('form#subscription button[type=submit]').removeAttr('disabled');
         $('span#username').remove();
      }
      return bRes;
   },

   ScrollBottom : function(){
      var container = $('#scrollContainer');
      container.scrollTop(container.prop('scrollHeight'));
   },

   getTextWidth : function(text){
      var org = $(this);
      var html = $('<span style="postion:absolute;width:auto;left:-9999px">' + (text || org.html()) + '</span>');
      if (!text) {
         html.css("font-family", org.css("font-family"));
         html.css("font-size", org.css("font-size"));
      }
      $('body').append(html);
      var width = html.width();
      html.remove();
      return width;
   },

   getPadding : function(html){
      var org = $(this);
      $('body').append(html);
      var padding = html.css('padding');
      html.remove();
      return padding;
   },

   appendToContainer : function(item,target){
      $input = $('<span/>',{
            class:'label label-info',
            text:item,
            style:'margin-left:4px'
          });

         var button=$('<button/>',{
            id:target,
            type: 'button',
            class: 'close',
            html: "&times;"
         });
         button.appendTo($input);
         var spacer = 6;
         var padding = Utils.getPadding($input)
         padding = padding.split(' ');
         // width = largeur texte + 2*padding + spacer + largeur boutton + 2*margin boutton
         var width = Utils.getTextWidth(item) +
            button.width() + spacer +
            2 * parseInt(padding[1]);
         $input.css('width',width);

         $('#'+target+'Container').append($input);

         closeButtons=$('button#'+target);
         $.each(closeButtons,function(){
            $(this).click(function(){
               $(this).parent().remove();
            });
         });
   },

   removeErrorOnFocus : function(){

      forms=$('form');
      $.each(forms,function(){
         $(this).find('div.control-group').focusin(function(){
            if($(this).hasClass('error'))
            {
               $(this).find('span.help-inline').hide();
               $(this).removeClass('error');
            }
         });
      });

   }
};
