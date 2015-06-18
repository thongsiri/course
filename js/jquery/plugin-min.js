(function(a){var c=(a.browser.msie?"paste":"input")+".mask";var b=(window.orientation!=undefined);a.mask={definitions:{"9":"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"}};a.fn.extend({caret:function(e,f){if(this.length==0){return}if(typeof e=="number"){f=(typeof f=="number")?f:e;return this.each(function(){if(this.setSelectionRange){this.focus();this.setSelectionRange(e,f)}else{if(this.createTextRange){var g=this.createTextRange();g.collapse(true);g.moveEnd("character",f);g.moveStart("character",e);g.select()}}})}else{if(this[0].setSelectionRange){e=this[0].selectionStart;f=this[0].selectionEnd}else{if(document.selection&&document.selection.createRange){var d=document.selection.createRange();e=0-d.duplicate().moveStart("character",-100000);f=e+d.text.length}}return{begin:e,end:f}}},unmask:function(){return this.trigger("unmask")},mask:function(j,d){if(!j&&this.length>0){var f=a(this[0]);var g=f.data("tests");return a.map(f.data("buffer"),function(l,m){return g[m]?l:null}).join("")}d=a.extend({placeholder:"_",completed:null},d);var k=a.mask.definitions;var g=[];var e=j.length;var i=null;var h=j.length;a.each(j.split(""),function(m,l){if(l=="?"){h--;e=m}else{if(k[l]){g.push(new RegExp(k[l]));if(i==null){i=g.length-1}}else{g.push(null)}}});return this.each(function(){var r=a(this);var m=a.map(j.split(""),function(x,y){if(x!="?"){return k[x]?d.placeholder:x}});var n=false;var q=r.val();r.data("buffer",m).data("tests",g);function v(x){while(++x<=h&&!g[x]){}return x}function t(x){while(!g[x]&&--x>=0){}for(var y=x;y<h;y++){if(g[y]){m[y]=d.placeholder;var z=v(y);if(z<h&&g[y].test(m[z])){m[y]=m[z]}else{break}}}s();r.caret(Math.max(i,x))}function u(y){for(var A=y,z=d.placeholder;A<h;A++){if(g[A]){var B=v(A);var x=m[A];m[A]=z;if(B<h&&g[B].test(x)){z=x}else{break}}}}function l(y){var x=a(this).caret();var z=y.keyCode;n=(z<16||(z>16&&z<32)||(z>32&&z<41));if((x.begin-x.end)!=0&&(!n||z==8||z==46)){w(x.begin,x.end)}if(z==8||z==46||(b&&z==127)){t(x.begin+(z==46?0:-1));return false}else{if(z==27){r.val(q);r.caret(0,p());return false}}}function o(B){if(n){n=false;return(B.keyCode==8)?false:null}B=B||window.event;var C=B.charCode||B.keyCode||B.which;var z=a(this).caret();if(B.ctrlKey||B.altKey||B.metaKey){return true}else{if((C>=32&&C<=125)||C>186){var x=v(z.begin-1);if(x<h){var A=String.fromCharCode(C);if(g[x].test(A)){u(x);m[x]=A;s();var y=v(x);a(this).caret(y);if(d.completed&&y==h){d.completed.call(r)}}}}}return false}function w(x,y){for(var z=x;z<y&&z<h;z++){if(g[z]){m[z]=d.placeholder}}}function s(){return r.val(m.join("")).val()}function p(y){var z=r.val();var C=-1;for(var B=0,x=0;B<h;B++){if(g[B]){m[B]=d.placeholder;while(x++<z.length){var A=z.charAt(x-1);if(g[B].test(A)){m[B]=A;C=B;break}}if(x>z.length){break}}else{if(m[B]==z[x]&&B!=e){x++;C=B}}}if(!y&&C+1<e){r.val("");w(0,h)}else{if(y||C+1>=e){s();if(!y){r.val(r.val().substring(0,C+1))}}}return(e?B:i)}if(!r.attr("readonly")){r.one("unmask",function(){r.unbind(".mask").removeData("buffer").removeData("tests")}).bind("focus.mask",function(){q=r.val();var x=p();s();setTimeout(function(){if(x==j.length){r.caret(0,x)}else{r.caret(x)}},0)}).bind("blur.mask",function(){p();if(r.val()!=q){r.change()}}).bind("keydown.mask",l).bind("keypress.mask",o).bind(c,function(){setTimeout(function(){r.caret(p(true))},0)})}p()})}})})(jQuery);
(function(e){e.fn.growfield=function(a){this.each(function(){this._growField=true;var b=e(this);if(this.tagName.toLowerCase()!="textarea")return false;a||(a={});var g=this;this.gf={auto:typeof a.auto!="undefined"?a.auto:true,animate:typeof a.animate!="undefined"?a.animate:true,hOffset:typeof a.offset!="undefined"?a.offset:0,before:a.before||null,after:a.after||null,min:a.min||false,max:a.max||false,restore:a.restore||false,initialH:0,busy:false,keysEnabled:false,dummy:null,queue:0,speed:300,ms:15,
timeout:false,opera9:false,impossible:false};this._growInit=function(){if(this.gf.before)this._growCallbackBefore=this.gf.before;if(this.gf.after)this._growCallbackAfter=this.gf.after;this.gf.initialH=b.get(0).offsetHeight;if(typeof b.attr("autogrow")!="undefined")this.gf.auto=parseInt(b.attr("autogrow"));if(typeof b.attr("animate")!="undefined")this.gf.animate=parseInt(b.attr("animate"));if(typeof b.attr("min")!="undefined")this.gf.min=parseInt(b.attr("min"));if(typeof b.attr("max")!="undefined")this.gf.max=
parseInt(b.attr("max"));if(typeof b.attr("restore")!="undefined")this.gf.restore=parseInt(b.attr("restore"));if(typeof b.attr("speed")!="undefined")this.gf.speed=parseInt(b.attr("speed"));if(!this.gf.min)this.gf.min=parseInt(b.css("min-height"));if(!this.gf.min)this.gf.min=this.gf.initialH;if(!this.gf.max)this.gf.max=parseInt(b.css("max-height"));this.gf.opera9=e.browser.opera&&e.browser.version<9.5;if(this.gf.restore){this.gf.restore=false;this._toggleRestore(true)}if(this.gf.auto)if(this.gf.initialH==
0)b.bind("keyup.growinit",this._afterShowInit);else{this.gf.auto=false;this._toggleAuto(true)}else this._toggleKeys(true);return true};this._afterShowInit=function(){this.gf.initialH=b.get(0).offsetHeight;if(!this.gf.initialH)return true;if(!this.gf.min)this.gf.min=this.gf.initialH;b.unbind(".growinit");this.gf.auto=false;this._toggleAuto(true);b.focus();return true};this._toggleKeys=function(c){if(c){if(this.gf.keysEnabled)return false;b.bind((e.browser.msie?"keyup":"keydown")+".autogrow",function(d){if(!d.ctrlKey||
e.inArray(d.keyCode,[38,40])==-1)return true;b[d.keyCode==38?"decrease":"increase"](false,d);e.browser.opera&&b.focus();if(e.browser.msie||e.browser.opera)return false;return true});this.gf.keysEnabled=true}else{if(!this.gf.keysEnabled)return false;b.unbind((e.browser.msie?"keyup":"keydown")+".autogrow");this.gf.keysEnabled=false}};this._toggleAuto=function(c){if(e.browser.opera||c){b.css("overflow","hidden");e.browser.opera&&b.attr("style")&&b.attr("style").indexOf("border")==-1&&b.css("border",
"1px solid #ccc")}if(c){if(this.gf.auto)return false;this._toggleKeys(false);this._createDummy();if(this.gf.impossible)return this._growField=false;b.css("overflow","hidden");b.bind("keyup.autogrow",function(d){if(b.val())return this._changeSize(this._textHeight(),d);else this._changeSize(this.gf.min,d)});b.val()&&b.keyup();e(window).bind("resize.autogrow",function(){g.gf.dummy.width(b.width())});this.gf.auto=true}else{if(!this.gf.auto)return false;this.gf.dummy.remove();this.gf.dummy=null;b.unbind("keyup.autogrow");
e(window).unbind("resize.autogrow");b.css("overflow","auto");this.gf.auto=false;this._toggleKeys(true)}return true};this._toggleRestore=function(c){if(c){if(this.gf.restore)return false;this.gf.restore=true;b.bind("focus.autogrow",function(d,f){return!this.gf.auto||f||!b.val()?true:this._changeSize(this._textHeight(),d)});b.bind("blur.autogrow",function(d){return this.gf.auto?this._changeSize(this.gf.min,d):true})}else{if(!this.gf.restore)return false;this.gf.restore=false;b.unbind("focus.autogrow").unbind("blur.autogrow");
b.keyup()}};this._changeSize=function(c,d){if(this.gf.busy)return true;d||(d={});this._growBefore(d);var f=b.css("overflow");if(this.gf.max>0&&c>=this.gf.max){c=this.gf.max;if(f=="hidden"){b.css("overflow","auto");d.type=="keyup"&&b.focus();d.type=="focus"&&this.gf.animate&&this.gf.auto&&b.trigger("focus",true)}}else if(f=="auto"&&this.gf.auto){b.css("overflow","hidden");d.type=="keyup"&&b.focus()}if(this.gf.min>0&&c<=this.gf.min)c=this.gf.min;if(c==b.get(0).offsetHeight){this.gf.busy=false;return true}return this._animate(b.get(0).offsetHeight,
c,d,f)};this._animate=function(c,d,f,h){if(!this.gf.animate||h=="auto"&&this.gf.auto||f.type=="init"){b.height(d);return this._growAfter(f)}this.gf.queue=Math.floor(this.gf.speed/this.gf.ms*(d<c?-1:1));this._timeout(c,d);return true};this._timeout=function(c,d){if(g.gf.queue==0)return g._growAfter();g.gf.queue+=g.gf.queue>0?-1:1;if(Math.abs(d-c)<3){b.height(d);return g._growAfter()}c=g.gf.queue==0?d:c+Math.ceil((d-c)/2);b.height(c);g.gf.timeout=window.setTimeout(function(){g._timeout(c,d)},g.gf.ms)};
this._textHeight=function(){var c=b.val();if(e.browser.safari&&c.substr(-2)=="\n\n")c=c.substring(0,c.length-2)+"\n11";e.browser.safari&&this.gf.dummy.val("");this.gf.dummy.val(c);this.gf.opera9&&this.gf.dummy.css("overflow","hidden").css("overflow","auto");c=this.gf.dummy.get(0);if(this.gf.opera9)return c.clientHeight+this.gf.hOffset;return c.scrollHeight+(e.browser.safari?1:0)>c.clientHeight?c.scrollHeight+(c.offsetHeight-c.clientHeight)+this.gf.hOffset+(e.browser.safari?this.gf.hOffset:0):b.val()?
c.offsetHeight+this.gf.hOffset:this.gf.min};this._createDummy=function(){if(this.gf.dummy){this.gf.dummy.remove();this.gf.dummy=false}for(var c=true,d=false;c;){this.gf.dummy=b.clone().css({position:"absolute",left:-9999,top:0,visibility:"hidden",width:b.get(0).offsetWidth}).attr("tabindex",-9999);if(this.gf.opera9){this.gf.dummy.css({overflow:"auto",height:"auto"});var f=b.css("padding");if(f&&f<4||d)this.gf.dummy.css({padding:"4px"})}this.gf.dummy.get(0)._growField=false;b.after(this.gf.dummy);
this.gf.dummy.val("").height(10);this.gf.dummy.val("11");this.gf.opera9&&this.gf.dummy.css("overflow","hidden").css("overflow","auto");f=this.gf.dummy.get(0).scrollHeight;this.gf.dummy.val("11\n11");this.gf.opera9&&this.gf.dummy.css("overflow","hidden").css("overflow","auto");var h=this.gf.dummy.get(0).scrollHeight;if(!this.gf.hOffset){this.gf.hOffset=h-f;if(e.browser.opera&&!this.gf.opera9)this.gf.hOffset+=this.gf.dummy.get(0).offsetHeight-this.gf.dummy.height()}if(this.gf.opera9&&this.gf.hOffset==
0)if(d)c=false;else{d=true;this.gf.dummy.remove()}else c=false}};this._growBefore=function(c){this.gf.busy=true;this._growCallbackBefore(c)};this._growAfter=function(c){if(this.gf.timeout){window.clearTimeout(this.gf.timeout);this.gf.timeout=false}this.gf.busy=false;this._growCallbackAfter(c);return true};this._growCallbackBefore=function(){};this._growCallbackAfter=function(){};e(function(){g._growInit()})})};e.fn.increase=function(a,b){this.each(function(){if(!this._growField||this.gf.auto)return true;
this._changeSize(this.offsetHeight+(a?parseInt(a):this.gf.hOffset),b)})};e.fn.decrease=function(a,b){this.each(function(){if(!this._growField||this.gf.auto)return true;this._changeSize(this.offsetHeight-(a?parseInt(a):this.gf.hOffset),b)})};e.fn.growToggleAuto=function(a){a&&a!=true&&a!=false&&a.toLowerCase()!="on"&&a.toLowerCase()!="off"&&delete a;if(a&&typeof a=="string")a=a.toLowerCase()=="on"?true:false;this.each(function(){if(!this._growField)return true;this._toggleAuto(a)})};e.fn.growToggleAnimation=
function(a){a&&a!=true&&a!=false&&a.toLowerCase()!="on"&&a.toLowerCase()!="off"&&delete a;if(a&&typeof a=="string")a=a.toLowerCase()=="on"?true:false;this.each(function(){if(!this._growField)return true;this.gf.animate=a})};e.fn.growTo=function(a){this.each(function(){if(!this._growField)return true;this._changeSize(a)})};e.fn.growSetMin=function(a){this.each(function(){if(!this._growField)return true;a=parseInt(a);if(a<10&&this.gf.initialH)a=this.gf.initialH;if(a<10)return true;this.gf.min=parseInt(a);
this.offsetHeight<this.gf.min&&e(this).growTo(this.gf.min)})};e.fn.growSetMax=function(a){this.each(function(){if(!this._growField)return true;this.gf.max=parseInt(a);this.offsetHeight>this.gf.max&&e(this).growTo(this.gf.max)})};e.fn.growToggleRestore=function(a){a&&a!=true&&a!=false&&a.toLowerCase()!="on"&&a.toLowerCase()!="off"&&delete a;if(a&&typeof a=="string")a=a.toLowerCase()=="on"?true:false;this.each(function(){if(!this._growField)return true;this._toggleRestore(a)})};e.fn.growRenewDummy=
function(){this.each(function(){if(!this._growField)return true;this._createDummy()})}})(jQuery);
jQuery.fn.pagination=function(h,a){a=jQuery.extend({items_per_page:10,num_display_entries:10,current_page:0,num_edge_entries:0,link_to:"#",prev_text:"Prev",next_text:"Next",ellipse_text:"...",prev_show_always:true,next_show_always:true,callback:function(){return false}},a||{});return this.each(function(){function m(){return Math.ceil(h/a.items_per_page)}function o(){var b=Math.ceil(a.num_display_entries/2),c=m(),i=c-a.num_display_entries;i=d>b?Math.max(Math.min(d-b,i),0):0;b=d>b?Math.min(d+b,c):Math.min(a.num_display_entries,
c);return[i,b]}function l(b,c){d=b;n();b=a.callback(b,j);if(!b)if(c.stopPropagation)c.stopPropagation();else c.cancelBubble=true;return b}function n(){j.empty();var b=o(),c=m(),i=function(e){return function(g){return l(e,g)}},k=function(e,g){e=e<0?0:e<c?e:c-1;g=jQuery.extend({text:e+1,classes:""},g||{});e=e==d?jQuery("<span class='current'>"+g.text+"</span>"):jQuery("<a>"+g.text+"</a>").bind("click",i(e)).attr("href",a.link_to.replace(/__id__/,e));g.classes&&e.addClass(g.classes);j.append(e)};if(a.prev_text&&
(d>0||a.prev_show_always))k(d-1,{text:a.prev_text,classes:"prev"});if(b[0]>0&&a.num_edge_entries>0){for(var p=Math.min(a.num_edge_entries,b[0]),f=0;f<p;f++)k(f);a.num_edge_entries<b[0]&&a.ellipse_text&&jQuery("<span>"+a.ellipse_text+"</span>").appendTo(j)}for(f=b[0];f<b[1];f++)k(f);if(b[1]<c&&a.num_edge_entries>0){c-a.num_edge_entries>b[1]&&a.ellipse_text&&jQuery("<span>"+a.ellipse_text+"</span>").appendTo(j);for(f=Math.max(c-a.num_edge_entries,b[1]);f<c;f++)k(f)}if(a.next_text&&(d<c-1||a.next_show_always))k(d+
1,{text:a.next_text,classes:"next"})}var d=a.current_page;h=!h||h<0?1:h;a.items_per_page=!a.items_per_page||a.items_per_page<0?1:a.items_per_page;var j=jQuery(this);this.selectPage=function(b){l(b)};this.prevPage=function(){if(d>0){l(d-1);return true}else return false};this.nextPage=function(){if(d<m()-1){l(d+1);return true}else return false};n();a.callback(d,this)})};

$.editable.addInputType('masked', {
    element : function(settings, original) {
        var input = $('<input />').mask(settings.mask);
        $(this).append(input);
        return(input);
    }
});
$.editable.addInputType('input', {
    element : function(settings, original) {
        var input = $('<input />');
        $(this).append(input);
        return(input);
    }
});
$.editable.addInputType('growfield', {
    element : function(settings, original) {
        var textarea = $('<textarea>');
        if (settings.rows) {
            textarea.attr('rows', settings.rows);
        } else {
            textarea.height(settings.height);
        }
        if (settings.cols) {
            textarea.attr('cols', settings.cols);
        } else {
            textarea.width(settings.width);
        }
        // will execute when textarea is rendered
        textarea.ready(function() {
                // implement your scroll pane code here
        });
        $(this).append(textarea);
        return(textarea);
    },
    plugin : function(settings, original) {
        // applies the growfield effect to the in-place edit field
        $('textarea', this).growfield(settings.growfield);
    }
});

$.editable.addInputType('ajaxupload', {
    /* create input element */
    element : function(settings) {
        settings.onblur = 'ignore';
        var input = $('<input type="file" id="upload" name="upload" />');
        $(this).append(input);
        return(input);
    },
    content : function(string, settings, original) {
        /* do nothing */
    },
    plugin : function(settings, original) {
        var form = this;
        form.attr("enctype", "multipart/form-data");
        $("button:submit", form).bind('click', function() {
            //$(".message").show();
            $.ajaxFileUpload({
                url: settings.target,
                secureuri:false,
                fileElementId: 'upload',
                dataType: 'html',
                success: function (data, status) {
                    $(original).html(data);
                    original.editing = false;
                },
                error: function (data, status, e) {
                    alert(e);
                }
            });
            return(false);
        });
    }
});

$.editable.addInputType('datepicker', {
	element : function(settings, original) {
	    var input = $('<input>');
	    if (settings.width  != 'none') { input.width(settings.width);  }
	    if (settings.height != 'none') { input.height(settings.height); }
	    input.attr('autocomplete','off');
	    $(this).append(input);
	    return(input);
	},
	plugin : function(settings, original) {
	    /* Workaround for missing parentNode in IE */
	    var form = this;
	    settings.onblur = 'ignore';
	    $(this).find('input').datepicker({
	        firstDay: 1,
	        dateFormat: 'yy-mm-dd',
	        closeText: 'X',
	        onSelect: function(dateText) { $(this).hide(); $(form).trigger("submit"); },
	        onClose: function(dateText) {
	            original.reset.apply(form, [settings, original]);
	            $(original).addClass( settings.cssdecoration );
	            },
	    });
}});
