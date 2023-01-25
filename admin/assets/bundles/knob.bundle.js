!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):t(jQuery)}(function(l){"use strict";var s={},c=Math.max,u=Math.min;s.c={},s.c.d=l(document),s.c.t=function(t){return t.originalEvent.touches.length-1},s.o=function(){var h=this;this.o=null,this.$=null,this.i=null,this.g=null,this.v=null,this.cv=null,this.x=0,this.y=0,this.w=0,this.h=0,this.$c=null,this.c=null,this.t=0,this.isInit=!1,this.fgColor=null,this.pColor=null,this.dH=null,this.cH=null,this.eH=null,this.rH=null,this.scale=1,this.relative=!1,this.relativeWidth=!1,this.relativeHeight=!1,this.$div=null,this.run=function(){function t(t,i){for(var s in i)h.o[s]=i[s];h._carve().init(),h._configure()._draw()}if(!this.$.data("kontroled")){if(this.$.data("kontroled",!0),this.extend(),this.o=l.extend({min:void 0!==this.$.data("min")?this.$.data("min"):0,max:void 0!==this.$.data("max")?this.$.data("max"):100,stopper:!0,readOnly:this.$.data("readonly")||"readonly"===this.$.attr("readonly"),cursor:(!0===this.$.data("cursor")?30:this.$.data("cursor"))||0,thickness:this.$.data("thickness")&&Math.max(Math.min(this.$.data("thickness"),1),.01)||.35,lineCap:this.$.data("linecap")||"butt",width:this.$.data("width")||200,height:this.$.data("height")||200,displayInput:null==this.$.data("displayinput")||this.$.data("displayinput"),displayPrevious:this.$.data("displayprevious"),fgColor:this.$.data("fgcolor")||"#87CEEB",inputColor:this.$.data("inputcolor"),font:this.$.data("font")||"Arial",fontWeight:this.$.data("font-weight")||"bold",inline:!1,step:this.$.data("step")||1,rotation:this.$.data("rotation"),draw:null,change:null,cancel:null,release:null,format:function(t){return t},parse:function(t){return parseFloat(t)}},this.o),this.o.flip="anticlockwise"===this.o.rotation||"acw"===this.o.rotation,this.o.inputColor||(this.o.inputColor=this.o.fgColor),this.$.is("fieldset")?(this.v={},this.i=this.$.find("input"),this.i.each(function(i){var s=l(this);h.i[i]=s,h.v[i]=h.o.parse(s.val()),s.bind("change blur",function(){var t={};t[i]=s.val(),h.val(h._validate(t))})}),this.$.find("legend").remove()):(this.i=this.$,this.v=this.o.parse(this.$.val()),""===this.v&&(this.v=this.o.min),this.$.bind("change blur",function(){h.val(h._validate(h.o.parse(h.$.val())))})),this.o.displayInput||this.$.hide(),this.$c=l(document.createElement("canvas")).attr({width:this.o.width,height:this.o.height}),this.$div=l('<div style="'+(this.o.inline?"display:inline;":"")+"width:"+this.o.width+"px;height:"+this.o.height+'px;"></div>'),this.$.wrap(this.$div).before(this.$c),this.$div=this.$.parent(),"undefined"!=typeof G_vmlCanvasManager&&G_vmlCanvasManager.initElement(this.$c[0]),this.c=this.$c[0].getContext?this.$c[0].getContext("2d"):null,!this.c)throw{name:"CanvasNotSupportedException",message:"Canvas not supported. Please use excanvas on IE8.0.",toString:function(){return this.name+": "+this.message}};return this.scale=(window.devicePixelRatio||1)/(this.c.webkitBackingStorePixelRatio||this.c.mozBackingStorePixelRatio||this.c.msBackingStorePixelRatio||this.c.oBackingStorePixelRatio||this.c.backingStorePixelRatio||1),this.relativeWidth=this.o.width%1!=0&&this.o.width.indexOf("%"),this.relativeHeight=this.o.height%1!=0&&this.o.height.indexOf("%"),this.relative=this.relativeWidth||this.relativeHeight,this._carve(),this.v instanceof Object?(this.cv={},this.copy(this.v,this.cv)):this.cv=this.v,this.$.bind("configure",t).parent().bind("configure",t),this._listen()._configure()._xy().init(),this.isInit=!0,this.$.val(this.o.format(this.v)),this._draw(),this}},this._carve=function(){var t,i;return this.relative?(t=this.relativeWidth?this.$div.parent().width()*parseInt(this.o.width)/100:this.$div.parent().width(),i=this.relativeHeight?this.$div.parent().height()*parseInt(this.o.height)/100:this.$div.parent().height(),this.w=this.h=Math.min(t,i)):(this.w=this.o.width,this.h=this.o.height),this.$div.css({width:this.w+"px",height:this.h+"px"}),this.$c.attr({width:this.w,height:this.h}),1!==this.scale&&(this.$c[0].width=this.$c[0].width*this.scale,this.$c[0].height=this.$c[0].height*this.scale,this.$c.width(this.w),this.$c.height(this.h)),this},this._draw=function(){var t=!0;h.g=h.c,h.clear(),!1!==(t=h.dH?h.dH():t)&&h.draw()},this._touch=function(t){function i(t){(t=h.xy2val(t.originalEvent.touches[h.t].pageX,t.originalEvent.touches[h.t].pageY))!=h.cv&&(h.cH&&!1===h.cH(t)||(h.change(h._validate(t)),h._draw()))}return this.t=s.c.t(t),i(t),s.c.d.bind("touchmove.k",i).bind("touchend.k",function(){s.c.d.unbind("touchmove.k touchend.k"),h.val(h.cv)}),this},this._mouse=function(t){function i(t){(t=h.xy2val(t.pageX,t.pageY))!=h.cv&&(h.cH&&!1===h.cH(t)||(h.change(h._validate(t)),h._draw()))}return i(t),s.c.d.bind("mousemove.k",i).bind("keyup.k",function(t){27===t.keyCode&&(s.c.d.unbind("mouseup.k mousemove.k keyup.k"),h.eH&&!1===h.eH()||h.cancel())}).bind("mouseup.k",function(t){s.c.d.unbind("mousemove.k mouseup.k keyup.k"),h.val(h.cv)}),this},this._xy=function(){var t=this.$c.offset();return this.x=t.left,this.y=t.top,this},this._listen=function(){return this.o.readOnly?this.$.attr("readonly","readonly"):(this.$c.bind("mousedown",function(t){t.preventDefault(),h._xy()._mouse(t)}).bind("touchstart",function(t){t.preventDefault(),h._xy()._touch(t)}),this.listen()),this.relative&&l(window).resize(function(){h._carve().init(),h._draw()}),this},this._configure=function(){return this.o.draw&&(this.dH=this.o.draw),this.o.change&&(this.cH=this.o.change),this.o.cancel&&(this.eH=this.o.cancel),this.o.release&&(this.rH=this.o.release),this.o.displayPrevious?(this.pColor=this.h2rgba(this.o.fgColor,"0.4"),this.fgColor=this.h2rgba(this.o.fgColor,"0.6")):this.fgColor=this.o.fgColor,this},this._clear=function(){this.$c[0].width=this.$c[0].width},this._validate=function(t){t=~~((t<0?-.5:.5)+t/this.o.step)*this.o.step;return Math.round(100*t)/100},this.listen=function(){},this.extend=function(){},this.init=function(){},this.change=function(t){},this.val=function(t){},this.xy2val=function(t,i){},this.draw=function(){},this.clear=function(){this._clear()},this.h2rgba=function(t,i){return t=t.substring(1,7),"rgba("+(t=[parseInt(t.substring(0,2),16),parseInt(t.substring(2,4),16),parseInt(t.substring(4,6),16)])[0]+","+t[1]+","+t[2]+","+i+")"},this.copy=function(t,i){for(var s in t)i[s]=t[s]}},s.Dial=function(){s.o.call(this),this.startAngle=null,this.xy=null,this.radius=null,this.lineWidth=null,this.cursorExt=null,this.w2=null,this.PI2=2*Math.PI,this.extend=function(){this.o=l.extend({bgColor:this.$.data("bgcolor")||"#EEEEEE",angleOffset:this.$.data("angleoffset")||0,angleArc:this.$.data("anglearc")||360,inline:!0},this.o)},this.val=function(t,i){if(null==t)return this.v;t=this.o.parse(t),!1!==i&&t!=this.v&&this.rH&&!1===this.rH(t)||(this.cv=this.o.stopper?c(u(t,this.o.max),this.o.min):t,this.v=this.cv,this.$.val(this.o.format(this.v)),this._draw())},this.xy2val=function(t,i){var i=Math.atan2(t-(this.x+this.w2),-(i-this.y-this.w2))-this.angleOffset;return this.o.flip&&(i=this.angleArc-i-this.PI2),this.angleArc!=this.PI2&&i<0&&-.5<i?i=0:i<0&&(i+=this.PI2),i=i*(this.o.max-this.o.min)/this.angleArc+this.o.min,i=this.o.stopper?c(u(i,this.o.max),this.o.min):i},this.listen=function(){function t(t){t.preventDefault();var t=(i=t.originalEvent).detail||i.wheelDeltaX,i=i.detail||i.wheelDeltaY,s=a._validate(a.o.parse(a.$.val()))+(0<t||0<i?a.o.step:t<0||i<0?-a.o.step:0),s=c(u(s,a.o.max),a.o.min);a.val(s,!1),a.rH&&(clearTimeout(h),h=setTimeout(function(){a.rH(s),h=null},100),e=e||setTimeout(function(){h&&a.rH(s),e=null},200))}var h,e,s,n,a=this,o=1,r={37:-a.o.step,38:a.o.step,39:a.o.step,40:-a.o.step};this.$.bind("keydown",function(t){var i=t.keyCode;96<=i&&i<=105&&(i=t.keyCode=i-48),s=parseInt(String.fromCharCode(i)),isNaN(s)&&(13===i||8===i||9===i||189===i||190===i&&!a.$.val().match(/\./)||t.preventDefault(),-1<l.inArray(i,[37,38,39,40])&&(t.preventDefault(),i=a.o.parse(a.$.val())+r[i]*o,a.o.stopper&&(i=c(u(i,a.o.max),a.o.min)),a.change(a._validate(i)),a._draw(),n=window.setTimeout(function(){o*=2},30)))}).bind("keyup",function(t){isNaN(s)?n&&(window.clearTimeout(n),n=null,o=1,a.val(a.$.val())):a.$.val()>a.o.max&&a.$.val(a.o.max)||a.$.val()<a.o.min&&a.$.val(a.o.min)}),this.$c.bind("mousewheel DOMMouseScroll",t),this.$.bind("mousewheel DOMMouseScroll",t)},this.init=function(){(this.v<this.o.min||this.v>this.o.max)&&(this.v=this.o.min),this.$.val(this.v),this.w2=this.w/2,this.cursorExt=this.o.cursor/100,this.xy=this.w2*this.scale,this.lineWidth=this.xy*this.o.thickness,this.lineCap=this.o.lineCap,this.radius=this.xy-this.lineWidth/2,this.o.angleOffset&&(this.o.angleOffset=isNaN(this.o.angleOffset)?0:this.o.angleOffset),this.o.angleArc&&(this.o.angleArc=isNaN(this.o.angleArc)?this.PI2:this.o.angleArc),this.angleOffset=this.o.angleOffset*Math.PI/180,this.angleArc=this.o.angleArc*Math.PI/180,this.startAngle=1.5*Math.PI+this.angleOffset,this.endAngle=1.5*Math.PI+this.angleOffset+this.angleArc;var t=c(String(Math.abs(this.o.max)).length,String(Math.abs(this.o.min)).length,2)+2;this.o.displayInput&&this.i.css({width:(this.w/2+4>>0)+"px",height:(this.w/3>>0)+"px",position:"absolute","vertical-align":"middle","margin-top":(this.w/3>>0)+"px","margin-left":"-"+(3*this.w/4+2>>0)+"px",border:0,background:"none",font:this.o.fontWeight+" "+(this.w/t>>0)+"px "+this.o.font,"text-align":"center",color:this.o.inputColor||this.o.fgColor,padding:"0px","-webkit-appearance":"none"})||this.i.css({width:"0px",visibility:"hidden"})},this.change=function(t){this.cv=t,this.$.val(this.o.format(t))},this.angle=function(t){return(t-this.o.min)*this.angleArc/(this.o.max-this.o.min)},this.arc=function(t){var i;return t=this.angle(t),t=this.o.flip?(i=this.endAngle+1e-5)-t-1e-5:(i=this.startAngle-1e-5)+t+1e-5,this.o.cursor&&(i=t-this.cursorExt)&&(t+=this.cursorExt),{s:i,e:t,d:this.o.flip&&!this.o.cursor}},this.draw=function(){var t,i=this.g,s=this.arc(this.cv),h=1;i.lineWidth=this.lineWidth,i.lineCap=this.lineCap,"none"!==this.o.bgColor&&(i.beginPath(),i.strokeStyle=this.o.bgColor,i.arc(this.xy,this.xy,this.radius,this.endAngle-1e-5,this.startAngle+1e-5,!0),i.stroke()),this.o.displayPrevious&&(t=this.arc(this.v),i.beginPath(),i.strokeStyle=this.pColor,i.arc(this.xy,this.xy,this.radius,t.s,t.e,t.d),i.stroke(),h=this.cv==this.v),i.beginPath(),i.strokeStyle=(h?this.o:this).fgColor,i.arc(this.xy,this.xy,this.radius,s.s,s.e,s.d),i.stroke()},this.cancel=function(){this.val(this.v)}},l.fn.dial=l.fn.knob=function(i){return this.each(function(){var t=new s.Dial;t.o=i,t.$=l(this),t.run()}).parent()}}),$(function(){$(".knob").knob({draw:function(){if("tron"==this.$.data("skin")){var t=this.angle(this.cv),i=this.startAngle,s=this.startAngle,h=s+t;return this.g.lineWidth=this.lineWidth,this.o.cursor&&(s=h-.3)&&(h+=.3),this.o.displayPrevious&&(t=this.startAngle+this.angle(this.value),this.o.cursor&&(i=t-.3)&&(t+=.3),this.g.beginPath(),this.g.strokeStyle=this.previousColor,this.g.arc(this.xy,this.xy,this.radius-this.lineWidth,i,t,!1),this.g.stroke()),this.g.beginPath(),this.g.strokeStyle=this.o.fgColor,this.g.arc(this.xy,this.xy,this.radius-this.lineWidth,s,h,!1),this.g.stroke(),this.g.lineWidth=2,this.g.beginPath(),this.g.strokeStyle=this.o.fgColor,this.g.arc(this.xy,this.xy,this.radius-this.lineWidth+1+2*this.lineWidth/3,0,2*Math.PI,!1),this.g.stroke(),!1}}})});