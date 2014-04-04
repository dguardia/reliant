(function(){if(typeof this.RokSprocket=="undefined"){this.RokSprocket={}}else{Object.merge(this.RokSprocket,{Mosaic:null,MosaicBuilder:null})}var e="onorientationchange"in window;var t=new Class({Implements:[Options,Events],options:{settings:{}},initialize:function(e){this.setOptions(e);this.mosaics=document.getElements("[data-mosaic]");this.mosaic={};this.settings={};this.curve=Browser.opera?{equation:"ease-in-out"}:{curve:"cubic-bezier(0.37,0.61,0.59,0.87)"};try{RokMediaQueries.on("every",this.mediaQuery.bind(this))}catch(t){if(typeof console!="undefined"){console.error('Error while trying to add a RokMediaQuery "match" event',t)}}},attach:function(e,t){e=typeOf(e)=="number"?document.getElements("[data-mosaic="+this.getID(e)+"]"):e;t=typeOf(t)=="string"?JSON.decode(t):t;var n=e?(new Elements([e])).flatten():this.mosaics;n.each(function(e){e.store("roksprocket:mosaic:attached",true);this.setSettings(e,t,"restore");var n={loadmore:e.retrieve("roksprocket:mosaic:loadmore",function(t,n){if(t){t.preventDefault()}this.loadMore.call(this,t,e,n)}.bind(this)),ordering:e.retrieve("roksprocket:mosaic:ordering",function(t,n){this.orderBy.call(this,t,e,n)}.bind(this)),filtering:e.retrieve("roksprocket:mosaic:filtering",function(t,n){this.filterBy.call(this,t,e,n)}.bind(this)),document:document.retrieve("roksprocket:mosaic:document",function(t,n){this.toggleShift.call(this,t,e,n)}.bind(this))};e.addEvent("click:relay([data-mosaic-loadmore])",n.loadmore);e.addEvent("click:relay([data-mosaic-orderby])",n.ordering);e.addEvent("click:relay([data-mosaic-filterby])",n.filtering);e.retrieve("roksprocket:mosaic:ajax",new RokSprocket.Request({model:"mosaic",model_action:"getPage",onRequest:this.onRequest.bind(this,e),onSuccess:function(t){this.onSuccess(t,e,e.retrieve("roksprocket:mosaic:ajax"))}.bind(this)}));document.addEvents({"keydown:keys(shift)":n.document,"keyup:keys(shift)":n.document});this.initializeMosaic(e,function(){this.mediaQuery.delay(5,this,RokMediaQueries.getQuery())}.bind(this))},this)},detach:function(e){e=typeOf(e)=="number"?document.getElements("[data-mosaic="+this.getID(e)+"]"):e;var t=e?(new Elements([e])).flatten():this.mosaics;t.each(function(e){e.store("roksprocket:mosaic:attached",false);var t={loadmore:e.retrieve("roksprocket:mosaic:loadmore"),ordering:e.retrieve("roksprocket:mosaic:ordering"),filtering:e.retrieve("roksprocket:mosaic:filtering"),document:document.retrieve("roksprocket:mosaic:document")};e.removeEvent("click:relay([data-mosaic-loadmore])",t.loadmore);e.removeEvent("click:relay([data-mosaic-orderby])",t.ordering);e.removeEvent("click:relay([data-mosaic-filterby])",t.filtering);document.removeEvents({"keydown:keys(shift)":t.document,"keyup:keys(shift)":t.document})},this)},mediaQuery:function(e){var t;for(var n in this.mosaic){t=this.mosaic[n];t.resize("fast")}},setSettings:function(e,t,n){var r=this.getID(e),i=Object.clone(this.getSettings(e)||this.options.settings);if(!n||!this.settings["id-"+r]){this.settings["id-"+r]=Object.merge(i,t||i)}},getSettings:function(e){var t=this.getID(e);return this.settings["id-"+t]},getContainer:function(e){if(!e){e=document.getElements("[data-mosaic]")}if(typeOf(e)=="number"){e=document.getElement("[data-mosaic="+e+"]")}if(typeOf(e)=="string"){e=document.getElement(e)}return e},getID:function(e){if(typeOf(e)=="number"){e=document.getElement("[data-mosaic="+e+"]")}if(typeOf(e)=="string"){e=document.getElement(e)}return!e?e:e.get("data-mosaic")},loadMore:function(e,t,n){t=this.getContainer(t);n=typeOf(n)=="number"?n:this.getSettings(t).page||1;if(!t.retrieve("roksprocket:mosaic:attached")){return}var r=t.retrieve("roksprocket:mosaic:ajax"),i=t.getElement("[data-mosaic-filterby].active"),s={moduleid:t.get("data-mosaic"),behavior:!n?"reset":"append",displayed:!n?[]:this.getSettings(t).displayed||[],filter:i?i.get("data-mosaic-filterby")||"all":"all",page:++n};if(e&&e.shift){s.all=true}if(!r.isRunning()){r.cancel().setParams(s).send()}},filterBy:function(e,t,n){t.getElements("[data-mosaic-filterby]").removeClass("active");n.addClass("active");t.addClass("refreshing");this.loadMore(e,t,0)},nextAll:function(e,t){e=this.getContainer(e);if(typeOf(e)=="element"){return this.next(e,t)}e.each(function(e){this.next(e,t)},this)},toggleShift:function(e,t,n){var r=e.type||"keyup",i=document.getElements("[data-mosaic-loadmore]");if(!i.length){return true}if(r=="keydown"){i.addClass("load-all")}else{i.removeClass("load-all")}},onRequest:function(e){var t=e.getElements("[data-mosaic-loadmore]");if(t){t.addClass("loader")}this.detach(e)},onSuccess:function(e,t){var n="id-"+this.getID(t),r=t.retrieve("roksprocket:mosaic:ajax"),i=t.getElement("[data-mosaic-items]"),s=e.getPath("payload.html"),o=e.getPath("payload.page"),u=e.getPath("payload.more"),a=e.getPath("payload.behavior"),f=e.getPath("payload.displayed"),l=this.getSettings(t),c=l.animations,h;this.setSettings(t,{page:a=="reset"?1:o,displayed:f});t.removeClass("refreshing");var p=new Element("div",{html:s}),d=p.getChildren(),v={},m={};v=this.getAnimation(t,"_set").style;moofx(d).style(v);i.adopt(d);h=new Elements(d.getElements("img").flatten());this._loadImages(h.get("src"),function(){if(a=="reset"){this.mosaic[n].bricks.each(function(e,n){(function(){v=this.getAnimation(t,"_out");moofx(e).style(v.style);m=Object.merge({},this.curve,{duration:"250ms",callback:function(){e.dispose()}});moofx(e).animate(v.animate,m)}).delay(n*50,this)},this)}this.mosaic[n][a](d,function(){loadmore=t.getElements("[data-mosaic-loadmore]");if(loadmore){loadmore.removeClass("loader")}d=this.mosaic[n].bricks.filter(function(e){return d.contains(e)});d.each(function(e,n){(function(){v=this.getAnimation(t,"_in");m=Object.merge({},this.curve,{curve:"cubic-bezier(0.37,0.61,0.59,0.87)",duration:"300ms"});moofx(e).animate(v.animate,m)}).delay(n*100,this)},this);this.attach(t);t.getElements("[data-mosaic-loadmore]").removeClass("load-all")[!u?"addClass":"removeClass"]("hide");jQuery(t).trigger("hippo.mosaic.loaded")}.bind(this))}.bind(this))},getAnimation:function(e,t){var n=this.getSettings(e),r=n.animations||null,i={},s={_set:{style:{opacity:0},animate:{}},_out:{style:{opacity:1},animate:{opacity:0}},_in:{style:{},animate:{opacity:1}}};r=r?r.erase("fade"):null;if(r&&r.contains("flip")){r=r.erase("scale").erase("rotate")}switch(r?r.join(","):null){case"scale":s._set["style"]=Object.merge(s._set["style"],{transform:"scale(0.5)"});s._out["style"]=Object.merge(s._out["style"],{"transform-origin":"50% 50%"});s._out["animate"]=Object.merge(s._out["animate"],{transform:Browser.ie9?"scale(0.001)":"scale(0)"});s._in["animate"]=Object.merge(s._in["animate"],{transform:Browser.ie9||Browser.opera?"matrix(1, 0, 0, 1, 0, 0)":"scale(1)"});break;case"rotate":s._set["style"]=Object.merge(s._set["style"],{"transform-origin":"0 0",transform:"rotate(-10deg)"});s._out["style"]=Object.merge(s._out["style"],{"transform-origin":"0 0"});s._out["animate"]=Object.merge(s._out["animate"],{transform:"rotate(10deg)"});s._in["animate"]=Object.merge(s._in["animate"],{transform:"rotate(0)"});break;case"rotate,scale":case"scale,rotate":s._set["style"]=Object.merge(s._set["style"],{"transform-origin":"0 0",transform:"scale(0.5) rotate(-10deg)"});s._out["style"]=Object.merge(s._out["style"],{"transform-origin":"50% 50%"});s._out["animate"]=Object.merge(s._out["animate"],{transform:Browser.ie9?"scale(0.001) rotate(10deg)":"scale(0) rotate(10deg)"});s._in["animate"]=Object.merge(s._in["animate"],{transform:Browser.ie9||Browser.opera?"matrix(1, 0, 0, 1, 0, 0)":"scale(1) rotate(0)"});break;case"flip":s._set["style"]=Object.merge(s._set["style"],{"transform-origin":"50% 50%",transform:"scale(0.5) rotateY(360deg)"});s._out["style"]=Object.merge(s._out["style"],{"transform-origin":"50% 50%"});s._out["animate"]=Object.merge(s._out["animate"],{transform:Browser.ie9?"scale(0.0001) rotateY(360deg)":"scale(0.5) rotateY(360deg)"});s._in["animate"]=Object.merge(s._in["animate"],{transform:"scale(1) rotateY(0)"});break;default:}return s[t]},orderBy:function(e,t,n){var r="id-"+this.getID(t);if(!this.mosaic||!this.mosaic[r]){throw new Error("RokSprocket Mosaic: Mosaic class not available")}var i=n.get("data-mosaic-orderby");this.mosaic[r].order(i);t.getElements("[data-mosaic-orderby]").removeClass("active");if(i!="random"){n.addClass("active")}},initializeMosaic:function(e,t){var n="id-"+this.getID(e),r;if(this.mosaic&&this.mosaic[n]){if(typeof t=="function"){t.call(this.mosaic[n].bricks)}r=e.getElements("[data-mosaic-loadmore]");if(r){r.removeClass("loader")}return this.mosaic[n]}var i=e.getElements("img"),s=e.getElement("[data-mosaic-items]"),o=e.getElement(".active[data-mosaic-orderby]"),u={container:e,animated:true,gutter:0,order:o?o.get("data-mosaic-orderby"):e.getElements("[data-mosaic-orderby]").length?"random":"default"},a=s.getElements("[data-mosaic-item]");if(!a.length){return this.mosaic[n]}if(t&&typeof t=="function"){u.callback=t}moofx(s).style({"transform-style":"preserve-3d","backface-visibility":"hidden",opacity:1});moofx(a).style(this.getAnimation(e,"_in").animate);if(!i.length){r=e.getElements("[data-mosaic-loadmore]");if(r){r.removeClass("loader")}this.mosaic[n]=new RokSprocket.MosaicBuilder(s,u)}else{this._loadImages(i.get("src"),function(){r=e.getElements("[data-mosaic-loadmore]");if(r){r.removeClass("loader")}this.mosaic[n]=new RokSprocket.MosaicBuilder(s,u)}.bind(this))}return this.mosaic[n]},_loadImages:function(e,t){return e.length?new Asset.images(e,{onComplete:t.bind(this)}):t.bind(this)()}});var n=new Class({Implements:[Options,Events],options:{container:null,resizeable:false,animated:false,gutter:0,fitwidth:false,order:"default",containerStyle:{position:"relative"}},initialize:function(e,t){this.setOptions(t);this.element=document.id(e)||document.getElement(e)||null;if(!this.element){throw new Error('Mosaic Builder Error: Element "'+e+'" not found in the DOM.')}this.styleQueue=[];this.curve=Browser.opera?{equation:"ease-in-out"}:{curve:"cubic-bezier(0.37,0.61,0.59,0.87)"};this.originalState=this.getBricks();this.build();this.init(t.callback||null)},build:function(){var e=this.element.style;this.originalStyle={height:e.height||""};Object.each(this.options.containerStyle,function(t,n){this.originalStyle[n]=e[n]||""},this);moofx(this.element).style(this.originalStyle);this.offset={x:this.element.getStyle("padding-left").toInt(),y:this.element.getStyle("padding-top").toInt()};this.isFluid=this.options.columnWidth&&typeof this.options.columnWidth==="function";this.reloadItems(this.options.order||null)},init:function(e){this.getColumns();this.reLayout(e)},getBricks:function(e){return(e?e:this.element.getElements("[data-mosaic-item]")).setStyle("position","absolute")},reloadItems:function(e,t){this.bricks=this.getBricks(t);if(e=="random"||e=="default"){if(e=="random"){this.bricks=this.bricks.shuffle()}if(e=="default"){this.bricks=this.originalState.clone()}return this.bricks}this.bricks=e?this.orderBy(e):this.bricks;return this.bricks},orderBy:function(e){var t=false;return this.bricks.sort(function(n,r){var i=n.getElement("[data-mosaic-order-"+e+"]"),s=r.getElement("[data-mosaic-order-"+e+"]");if(!i||!s){if(console&&console.error&&!t){console.error('RokSprocket MosaicBuilder: Trying to sort by "'+e+'" but no sorting rule has been found.')}t=true;return 0}i=i.get("data-mosaic-order-"+e);s=s.get("data-mosaic-order-"+e);return i==s?0:i<s?-1:1}.bind(this))},reload:function(e){this.reloadItems();this.init(e)},layout:function(e,t,n){for(var r=0,i=e.length;r<i;r++){this.placeBrick(e[r])}var s={},o={};s.height=Math.max.apply(Math,this.colYs);if(this.options.fitwidth){var u=0;r=this.cols;while(--r){if(this.colYs[r]!==0){break}u++}s.width=(this.cols-u)*this.columnWidth-this.options.gutter}this.styleQueue.push({element:this.element,style:s});var a=!this.isLaidOut?"style":this.options.animated&&!n?"animate":"style",f;this.styleQueue.each(function(n,r){o=Object.merge({},this.curve,{duration:"400ms"});if(r==this.styleQueue.length-1){if(t){o.callback=t.bind(t,e)}}moofx(n.element)[a](n.style,o)},this);this.styleQueue.empty();if(t&&a=="style"){t.call(e)}this.isLaidOut=true},getColumns:function(){var e=this.options.fitwidth?this.element.getParent():this.element,t=e.offsetWidth;this.columnWidth=this.isFluid?this.options.columnWidth(t):this.options.columnWidth||this.bricks.length&&this.bricks[0].offsetWidth||t;this.columnWidth+=this.options.gutter;this.cols=Math.round((t+this.options.gutter)/this.columnWidth);this.cols=Math.max(this.cols,1)},placeBrick:function(e){e=document.id(e);var t,n,r,i;t=Math.round(e.offsetWidth/(this.columnWidth+this.options.gutter));t=Math.min(t,this.cols);if(t==1){r=this.colYs}else{n=this.cols+1-t;r=[];n.times(function(e){i=this.colYs.slice(e,e+t);r[e]=Math.max.apply(Math,i)},this)}var s=Math.min.apply(Math,r),o=0;for(var u=0,a=r.length;u<a;u++){if(r[u]===s){o=u;break}}var f={top:s+this.offset.y};f.left=o*(100/this.cols)+"%";this.styleQueue.push({element:e,style:f});var l=s+e.offsetHeight+(this.options.gutter||0),c=this.cols+1-r.length;c.times(function(e){this.colYs[o+e]=l},this)},resize:function(e){var t=this.cols;this.getColumns();if((this.isFluid||e)&&this.cols!==t||e){this.reLayout(null,e)}},reLayout:function(e,t){var n=this.cols;this.colYs=[];while(n--){this.colYs.push(0)}this.layout(this.bricks,e,t)},reset:function(e,t){e=e.filter(function(e){return e.get("data-mosaic-item")!==null||e.getElement("data-mosaic-item")});this.bricks=this.originalState=new Elements;e.setStyles({top:0,left:0,position:"absolute"});this.appendedBricks.delay(1,this,[e,e,t])},append:function(e,t){e=e.filter(function(e){return e.get("data-mosaic-item")!==null||e.getElement("data-mosaic-item")});if(!e){return}e.setStyles({top:this.element.getSize().y,left:0,position:"absolute"});this.appendedBricks.delay(1,this,[e,null,t])},appendedBricks:function(e,t,n){var r=this.options.container.getElement("[data-mosaic-orderby].active")||this.options.container.getElement("[data-mosaic-orderby=random]"),i=r?r.get("data-mosaic-orderby"):this.options.container.getElements("[data-mosaic-orderby]").length?"random":"default";this.originalState.append(e);this.order(i,t,n)},order:function(e,t,n){this.reloadItems(e,t||null);this.init(n)}});this.RokSprocket.Mosaic=t;this.RokSprocket.MosaicBuilder=n;if(e){window.addEventListener("orientationchange",function(){if(typeof RokSprocket=="undefined"||typeof RokSprocket.instances=="undefined"||typeof RokSprocket.instances.mosaic=="undefined"){return}var e;for(var t in RokSprocket.instances.mosaic.mosaic){e=RokSprocket.instances.mosaic.mosaic[t];e.resize("fast")}})}Element.implement({mosaic:function(e){var t=this.retrieve("roksprocket:mosaic:builder");if(!t){t=this.store("roksprocket:mosaic:builder",new RokSprocket.MosaicBuilder(this,e))}return t}});if(MooTools.version<"1.4.4"&&Browser.name=="ie"&&Browser.version<9){(function(){var e=["rel","data-next","data-mosaic","data-mosaic-items","data-mosaic-item","data-mosaic-content","data-mosaic-page","data-mosaic-next","data-mosaic-order","data-mosaic-orderby","data-mosaic-order-title","data-mosaic-order-date","data-mosaic-filterby","data-mosaic-loadmore"];e.each(function(e){Element.Properties[e]={get:function(){return this.getAttribute(e)}}})})()}})();