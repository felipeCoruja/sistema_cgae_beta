!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=11)}([function(e,t){e.exports=window.wp.i18n},function(e,t){e.exports=window.wp.components},function(e,t){e.exports=window.wp.blockEditor},function(e,t){e.exports=window.wp.data},function(e,t){e.exports=window.wp.blocks},function(e,t){e.exports=window.wp.editor},function(e,t,n){"use strict";var r=n(2),o=n(1),i=n(0),a=n(3),c=function(e){var t=Object(a.useSelect)((function(e){return e("core").getEntityRecords("postType","admin_form",{per_page:-1,status:"any"})}));if(Object(a.useSelect)((function(e){return e("core/data").isResolving("core","getEntityRecords",["postType","admin_form",{per_page:-1,status:"any"}])})))return React.createElement("p",null,Object(i.__)("Loading forms...","acf-frontend-form-element"));var n=[];return t&&(n.push({value:0,label:Object(i.__)("Select a form","acf-frontend-form-element"),disabled:!0}),t.forEach((function(e){n.push({value:e.id,label:e.title.rendered})}))),React.createElement(o.SelectControl,{options:n,label:Object(i.__)("Form","acf-frontend-form-element"),labelPosition:"side",value:e.value,onChange:e.onChange,onClick:e.onClick})},u=n(5),l=function(e){return e.form?React.createElement(o.Disabled,{key:"fea-disabled-render"},React.createElement(u.ServerSideRender,{block:e.block,attributes:{formID:e.form,editMode:1}})):null};t.a=function(e){var t=e.attributes,n=e.setAttributes,a=Object(r.useBlockProps)();return React.createElement("div",a,React.createElement(r.InspectorControls,{key:"fea-inspector-controls"},React.createElement(o.PanelBody,{title:Object(i.__)("Form Settings","acf-frontend-form-element"),initialOpen:!0},React.createElement(o.PanelRow,null,React.createElement(c,{value:t.formID,onChange:function(e){return n({formID:parseInt(e)})}})))),React.createElement(c,{value:t.formID,onChange:function(e){return n({formID:parseInt(e)})}}),React.createElement(l,{form:t.formID,block:e.name}))}},,,function(e){e.exports=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"acf-frontend/submissions","title":"Frontend Admin Submissions","description":"Display frontend submissions so that site admins can update content from the frontend.","category":"frontend-admin","textdomain":"frontend-admin","supports":{"align":["wide"]},"attributes":{"formID":{"type":"number","default":0},"editMode":{"type":"boolean","default":true}},"editorScript":"file:../../../build/admin-form-submissions/index.js"}')},,function(e,t,n){"use strict";n.r(t);var r=n(4),o=(n(0),n(6)),i=n(9);Object(r.registerBlockType)(i,{edit:o.a,save:function(){return null}})}]);