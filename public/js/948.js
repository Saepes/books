"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[948],{3948:(e,t,n)=>{n.r(t),n.d(t,{default:()=>c});const o={name:"Export",methods:{exportUser:function(){var e=this;axios.get("/sanctum/csrf-cookie").then((function(t){axios.get("/users/export/user").then((function(e){console.log(e)})).catch((function(t){console.log(t),e.errored=!0}))}))}}};const c=(0,n(1900).Z)(o,(function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("button",{on:{click:function(t){return t.preventDefault(),e.exportUser.apply(null,arguments)}}},[e._v("Скачать отчет")])])}),[],!1,null,"b9ac1086",null).exports}}]);