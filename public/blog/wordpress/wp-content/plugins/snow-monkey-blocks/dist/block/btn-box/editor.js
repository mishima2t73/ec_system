!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=17)}([function(e,t){e.exports=window.wp.element},function(e,t){e.exports=window.wp.blockEditor},function(e,t){e.exports=window.wp.i18n},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){var o;!function(){"use strict";var n={}.hasOwnProperty;function r(){for(var e=[],t=0;t<arguments.length;t++){var o=arguments[t];if(o){var l=typeof o;if("string"===l||"number"===l)e.push(o);else if(Array.isArray(o)){if(o.length){var c=r.apply(null,o);c&&e.push(c)}}else if("object"===l)if(o.toString===Object.prototype.toString)for(var a in o)n.call(o,a)&&o[a]&&e.push(a);else e.push(o.toString())}}return e.join(" ")}e.exports?(r.default=r,e.exports=r):void 0===(o=function(){return r}.apply(t,[]))||(e.exports=o)}()},function(e,t){e.exports=window.lodash},function(e,t){e.exports=window.wp.components},function(e,t){e.exports=window.wp.primitives},function(e){e.exports=JSON.parse('{"apiVersion":2,"name":"snow-monkey-blocks/btn-box","title":"Button box","description":"It is a button with micro copy.","category":"smb","attributes":{"lede":{"type":"string","source":"html","selector":".smb-btn-box__lede","default":""},"note":{"type":"string","source":"html","selector":".smb-btn-box__note","default":""},"backgroundColor":{"type":"string"},"btnLabel":{"type":"string","source":"html","selector":".smb-btn__label","default":""},"btnURL":{"type":"string","default":""},"btnTarget":{"type":"string","default":"_self"},"btnBackgroundColor":{"type":"string"},"btnTextColor":{"type":"string"},"btnSize":{"type":"string","default":""},"btnBorderRadius":{"type":"number"},"btnWrap":{"type":"boolean","default":false}},"example":{"attributes":{"lede":"Lorem ipsum dolor sit amet","note":"consectetur adipiscing elit","btnLabel":"button","btnURL":"https://2inc.org"}}}')},function(e,t){e.exports=window.wp.blocks},function(e,t){e.exports=window.wp.richText},function(e,t,n){var o=n(12),r=n(13),l=n(14),c=n(16);e.exports=function(e,t){return o(e)||r(e,t)||l(e,t)||c()},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(e){if(Array.isArray(e))return e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(e,t){var n=e&&("undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"]);if(null!=n){var o,r,l=[],_n=!0,c=!1;try{for(n=n.call(e);!(_n=(o=n.next()).done)&&(l.push(o.value),!t||l.length!==t);_n=!0);}catch(e){c=!0,r=e}finally{try{_n||null==n.return||n.return()}finally{if(c)throw r}}return l}},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){var o=n(15);e.exports=function(e,t){if(e){if("string"==typeof e)return o(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?o(e,t):void 0}},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,o=new Array(t);n<t;n++)o[n]=e[n];return o},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){"use strict";n.r(t);var o={};n.r(o),n.d(o,"metadata",(function(){return b})),n.d(o,"name",(function(){return w})),n.d(o,"settings",(function(){return C}));var r=n(3),l=n.n(r),c=n(0),a=(n(5),n(9)),s=(n(10),n(2)),b=n(8),i=n(11),u=n.n(i),m=n(4),d=n.n(m),p=n(6),f=n(1),_=n(7),v=Object(c.createElement)(_.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(c.createElement)(_.Path,{d:"M15.6 7.2H14v1.5h1.6c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.8 0 5.2-2.3 5.2-5.2 0-2.9-2.3-5.2-5.2-5.2zM4.7 12.4c0-2 1.7-3.7 3.7-3.7H10V7.2H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H10v-1.5H8.4c-2 0-3.7-1.7-3.7-3.7zm4.6.9h5.3v-1.5H9.3v1.5z"})),O=Object(c.createElement)(_.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(c.createElement)(_.Path,{d:"M15.6 7.3h-.7l1.6-3.5-.9-.4-3.9 8.5H9v1.5h2l-1.3 2.8H8.4c-2 0-3.7-1.7-3.7-3.7s1.7-3.7 3.7-3.7H10V7.3H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H9l-1.4 3.2.9.4 5.7-12.5h1.4c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.9 0 5.2-2.3 5.2-5.2 0-2.9-2.4-5.2-5.2-5.2z"})),j=function(e){return"_self"!==e&&("_blank"===e||void 0)},y=function(e){var t=e.url,n=e.target,o=e.onChange;return Object(c.createElement)(f.__experimentalLinkControl,{className:"wp-block-navigation-link__inline-link-input",value:{url:t,opensInNewTab:j(n)},onChange:o})};function x(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function g(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?x(Object(n),!0).forEach((function(t){l()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):x(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var k=b.attributes,h=[{attributes:g({},k),supports:{align:["wide","full"]},save:function(e){var t=e.attributes,n=t.lede,o=t.note,r=t.backgroundColor,a=t.btnLabel,s=t.btnURL,b=t.btnTarget,i=t.btnBackgroundColor,u=t.btnTextColor,m=t.btnSize;return Object(c.createElement)("div",{className:"smb-btn-box",style:{backgroundColor:r}},Object(c.createElement)("div",{className:"c-container"},!f.RichText.isEmpty(n)&&Object(c.createElement)("div",{className:"smb-btn-box__lede"},Object(c.createElement)(f.RichText.Content,{value:n})),Object(c.createElement)("div",{className:"smb-btn-box__btn-wrapper"},Object(c.createElement)("a",{className:d()("smb-btn",l()({},"smb-btn--".concat(m),!!m)),href:s,style:{backgroundColor:i},target:"_self"===b?void 0:b,rel:"_self"===b?void 0:"noopener noreferrer"},Object(c.createElement)("span",{className:"smb-btn__label",style:{color:u}},Object(c.createElement)(f.RichText.Content,{value:a})))),!f.RichText.isEmpty(o)&&Object(c.createElement)("div",{className:"smb-btn-box__note"},Object(c.createElement)(f.RichText.Content,{value:o}))))}},{attributes:g({},k),save:function(e){var t=e.attributes,n=t.lede,o=t.note,r=t.backgroundColor,l=t.btnLabel,a=t.btnURL,s=t.btnTarget,b=t.btnBackgroundColor,i=t.btnTextColor,u={};r&&"null"!==r&&(u.backgroundColor=r);var m={};b&&"null"!==b&&(m.btnBackgroundColor=b);var d={};return i&&"null"!==i&&(d.btnTextColor=i),Object(c.createElement)("div",{className:"smb-btn-box",style:u},Object(c.createElement)("div",{className:"c-container"},!f.RichText.isEmpty(n)&&Object(c.createElement)("div",{className:"smb-btn-box__lede"},Object(c.createElement)(f.RichText.Content,{value:n})),Object(c.createElement)("a",{className:"smb-btn smb-btn--full",href:a,target:s,style:m},Object(c.createElement)("span",{className:"smb-btn__label",style:d},Object(c.createElement)(f.RichText.Content,{value:l}))),!f.RichText.isEmpty(o)&&Object(c.createElement)("div",{className:"smb-btn-box__note"},Object(c.createElement)(f.RichText.Content,{value:o}))))}},{attributes:g({},k),supports:{align:["wide","full"]},save:function(e){var t=e.attributes,n=t.lede,o=t.note,r=t.backgroundColor,a=t.btnLabel,s=t.btnURL,b=t.btnTarget,i=t.btnBackgroundColor,u=t.btnTextColor,m=t.btnSize;return Object(c.createElement)("div",{className:"smb-btn-box",style:{backgroundColor:r}},Object(c.createElement)("div",{className:"c-container"},!f.RichText.isEmpty(n)&&Object(c.createElement)("div",{className:"smb-btn-box__lede"},Object(c.createElement)(f.RichText.Content,{value:n})),Object(c.createElement)("div",{className:"smb-btn-box__btn-wrapper"},Object(c.createElement)("a",{className:d()("smb-btn",l()({},"smb-btn--".concat(m),!!m)),href:s,target:b,style:{backgroundColor:i}},Object(c.createElement)("span",{className:"smb-btn__label",style:{color:u}},Object(c.createElement)(f.RichText.Content,{value:a})))),!f.RichText.isEmpty(o)&&Object(c.createElement)("div",{className:"smb-btn-box__note"},Object(c.createElement)(f.RichText.Content,{value:o}))))}}],w=b.name,C={icon:{foreground:"#cd162c",src:"embed-generic"},styles:[{name:"default",label:Object(s.__)("Default","snow-monkey-blocks"),isDefault:!0},{name:"ghost",label:Object(s.__)("Ghost","snow-monkey-blocks")}],edit:function(e){var t,n=e.attributes,o=e.setAttributes,r=e.isSelected,a=e.className,b=n.lede,i=n.note,m=n.backgroundColor,_=n.btnLabel,j=n.btnURL,x=n.btnTarget,g=n.btnBackgroundColor,k=n.btnTextColor,h=n.btnSize,w=n.btnBorderRadius,C=n.btnWrap,E=Object(c.useState)(!1),T=u()(E,2),N=T[0],R=T[1],S=!!j,B=S&&r,P=d()("smb-btn-box",a),L=d()("smb-btn",(t={},l()(t,"smb-btn--".concat(h),!!h),l()(t,"smb-btn--wrap",C),t)),M={backgroundColor:m||void 0},z={backgroundColor:g||void 0,borderRadius:void 0!==w?"".concat(w,"px"):void 0};"is-style-ghost"===n.className&&(z.borderColor=g||void 0);var H=Object(c.useRef)(),U=Object(f.useBlockProps)({className:P,style:M,ref:H}),A=function(e){var t=e.url,n=e.opensInNewTab;o({btnURL:t,btnTarget:n?"_blank":"_self"})};return Object(c.createElement)(c.Fragment,null,Object(c.createElement)(f.InspectorControls,null,Object(c.createElement)(p.PanelBody,{title:Object(s.__)("Button Settings","snow-monkey-blocks")},Object(c.createElement)(p.SelectControl,{label:Object(s.__)("Button size","snow-monkey-blocks"),value:h,onChange:function(e){return o({btnSize:e})},options:[{value:"",label:Object(s.__)("Normal size","snow-monkey-blocks")},{value:"little-wider",label:Object(s.__)("Litle wider","snow-monkey-blocks")},{value:"wider",label:Object(s.__)("Wider","snow-monkey-blocks")},{value:"more-wider",label:Object(s.__)("More wider","snow-monkey-blocks")},{value:"full",label:Object(s.__)("Full size","snow-monkey-blocks")}]}),Object(c.createElement)(p.RangeControl,{label:Object(s.__)("Border radius","snow-monkey-blocks"),value:w,onChange:function(e){return o({btnBorderRadius:e})},min:"0",max:"50",initialPosition:"6",allowReset:!0}),Object(c.createElement)(p.CheckboxControl,{label:Object(s.__)("Wrap","snow-monkey-blocks"),checked:C,onChange:function(e){return o({btnWrap:e})}}),Object(c.createElement)(f.__experimentalColorGradientControl,{label:Object(s.__)("Background Color","snow-monkey-blocks"),colorValue:g,onColorChange:function(e){return o({btnBackgroundColor:e})}}),Object(c.createElement)(f.__experimentalColorGradientControl,{label:Object(s.__)("Text Color","snow-monkey-blocks"),colorValue:k,onColorChange:function(e){return o({btnTextColor:e})}}),Object(c.createElement)(f.ContrastChecker,{backgroundColor:g,textColor:k})),Object(c.createElement)(f.PanelColorSettings,{title:Object(s.__)("Color Settings","snow-monkey-blocks"),initialOpen:!1,colorSettings:[{value:m,onChange:function(e){return o({backgroundColor:e})},label:Object(s.__)("Background Color","snow-monkey-blocks")}]})),Object(c.createElement)("div",U,Object(c.createElement)("div",{className:"c-container"},(!f.RichText.isEmpty(b)||r)&&Object(c.createElement)(f.RichText,{className:"smb-btn-box__lede",value:b,onChange:function(e){return o({lede:e})},placeholder:Object(s.__)("Write lede…","snow-monkey-blocks")}),Object(c.createElement)("div",{className:"smb-btn-box__btn-wrapper"},Object(c.createElement)("span",{className:L,href:j,style:z,target:"_self"===x?void 0:x,rel:"_self"===x?void 0:"noopener noreferrer"},Object(c.createElement)(f.RichText,{className:"smb-btn__label",value:_,keepPlaceholderOnFocus:!0,placeholder:Object(s.__)("Button","snow-monkey-blocks"),onChange:function(e){return o({btnLabel:e})},style:{color:k},withoutInteractiveFormatting:!0}))),(!f.RichText.isEmpty(i)||r)&&Object(c.createElement)(f.RichText,{className:"smb-btn-box__note",value:i,onChange:function(e){return o({note:e})},placeholder:Object(s.__)("Write note…","snow-monkey-blocks")}))),Object(c.createElement)(f.BlockControls,null,Object(c.createElement)(p.ToolbarGroup,null,!S&&Object(c.createElement)(p.ToolbarButton,{icon:v,label:Object(s.__)("Link","snow-monkey-blocks"),"aria-expanded":N,onClick:function(){return R(!N)}}),B&&Object(c.createElement)(p.ToolbarButton,{isPressed:!0,icon:O,label:Object(s.__)("Unlink","snow-monkey-blocks"),onClick:function(){return A("")}}))),(N||B)&&Object(c.createElement)(p.Popover,{position:"bottom center",anchorRef:H.current,onClose:function(){return R(!1)}},Object(c.createElement)(y,{url:j,target:x,onChange:A})))},save:function(e){var t,n=e.attributes,o=e.className,r=n.lede,a=n.note,s=n.backgroundColor,b=n.btnLabel,i=n.btnURL,u=n.btnTarget,m=n.btnBackgroundColor,p=n.btnTextColor,_=n.btnSize,v=n.btnBorderRadius,O=n.btnWrap,j=d()("smb-btn-box",o),y=d()("smb-btn",(t={},l()(t,"smb-btn--".concat(_),!!_),l()(t,"smb-btn--wrap",O),t)),x={backgroundColor:s||void 0},g={backgroundColor:m||void 0,borderRadius:void 0!==v?"".concat(v,"px"):void 0};return"is-style-ghost"===n.className&&(g.borderColor=m||void 0),Object(c.createElement)("div",f.useBlockProps.save({className:j,style:x}),Object(c.createElement)("div",{className:"c-container"},!f.RichText.isEmpty(r)&&Object(c.createElement)("div",{className:"smb-btn-box__lede"},Object(c.createElement)(f.RichText.Content,{value:r})),Object(c.createElement)("div",{className:"smb-btn-box__btn-wrapper"},Object(c.createElement)("a",{className:y,href:i,style:g,target:"_self"===u?void 0:u,rel:"_self"===u?void 0:"noopener noreferrer"},Object(c.createElement)("span",{className:"smb-btn__label",style:{color:p}},Object(c.createElement)(f.RichText.Content,{value:b})))),!f.RichText.isEmpty(a)&&Object(c.createElement)("div",{className:"smb-btn-box__note"},Object(c.createElement)(f.RichText.Content,{value:a}))))},deprecated:h};!function(e){if(e){var t=e.metadata,n=e.settings,o=e.name;t&&(t.title&&(t.title=Object(s.__)(t.title,"snow-monkey-blocks"),n.title=t.title),t.description&&(t.description=Object(s.__)(t.description,"snow-monkey-blocks"),n.description=t.description),t.keywords&&(t.keywords=Object(s.__)(t.keywords,"snow-monkey-blocks"),n.keywords=t.keywords),Object(a.unstable__bootstrapServerSideBlockDefinitions)(l()({},o,t))),Object(a.registerBlockType)(o,n)}}(o)}]);