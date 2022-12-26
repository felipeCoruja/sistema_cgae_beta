!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=12)}([function(e,t){e.exports=window.wp.i18n},function(e,t){e.exports=window.wp.components},function(e,t){e.exports=window.wp.blockEditor},,,,,function(e,t){e.exports=window.wp.element},,,,,function(e,t,n){"use strict";n.r(t);var r=n(0),o=n(1),a=n(7);function c(e,t,n,r,o,a,c){try{var i=e[a](c),l=i.value}catch(e){return void n(e)}i.done?t(l):Promise.resolve(l).then(r,o)}function i(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}var l=function(e){var t,n,l=(t=Object(a.useState)(!1),n=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var n=e&&("undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"]);if(null!=n){var r,o,a=[],_n=!0,c=!1;try{for(n=n.call(e);!(_n=(r=n.next()).done)&&(a.push(r.value),!t||a.length!==t);_n=!0);}catch(e){c=!0,o=e}finally{try{_n||null==n.return||n.return()}finally{if(c)throw o}}return a}}(t,n)||function(e,t){if(e){if("string"==typeof e)return i(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?i(e,t):void 0}}(t,n)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),u=l[0],f=l[1],p=Object(a.useRef)(!0),s=function(){var e,t=(e=regeneratorRuntime.mark((function e(){var t,n=arguments;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return t=n.length>0&&void 0!==n[0]?n[0]:function(){},e.next=3,wp.apiFetch({path:"fea/v1/admin-fields"}).then((function(e){t(e)}));case 3:case"end":return e.stop()}}),e)})),function(){var t=this,n=arguments;return new Promise((function(r,o){var a=e.apply(t,n);function i(e){c(a,r,o,i,l,"next",e)}function l(e){c(a,r,o,i,l,"throw",e)}i(void 0)}))});return function(){return t.apply(this,arguments)}}();return Object(a.useEffect)((function(){s((function(e){p.current||f(e)}))}),[]),u?React.createElement(o.SelectControl,{label:Object(r.__)("Field","acf-frontend-form-element"),value:e.value,onChange:""},React.createElement("option",{key:"0",value:"",disabled:!0},Object(r.__)("Select a field","acf-frontend-form-element")),u.map((function(e){return React.createElement("optgroup",{key:e.id,label:e.title},Object.keys(e.fields).map((function(t){return React.createElement("option",{key:t,value:t},e.fields[t].label)})))}))):React.createElement("p",null,Object(r.__)("Loading fields...","acf-frontend-form-element"))},u=n(2),f=wp.compose.compose(wp.compose.createHigherOrderComponent((function(e){return function(t){if("core/paragraph"!==t.name)return React.createElement(e,t);var n=wp.element.Fragment,a=(t.attributes,t.isSelected);return React.createElement(n,null,React.createElement("div",{className:newClassName},React.createElement(e,newProps),a&&"core/paragraph"==t.name&&React.createElement(u.InspectorControls,null,React.createElement(o.PanelBody,{title:Object(r.__)("Dynamic Values")},React.createElement(l,{label:Object(r.__)("Field","frontend-admin"),value:"",onChange:""})))))}}),"dynamicValueControls"));wp.hooks.addFilter("editor.BlockEdit","frontend-admin/dynamic-values",f)}]);