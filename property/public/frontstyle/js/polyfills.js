!function(t){function n(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}var e={};n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:r})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},n.p="../../dist/desktop/default.htm",n(n.s=1014)}({1014:function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var r=e(1015),o=(e.n(r),e(1018));e.n(o)},1015:function(t,n,e){"use strict";t.exports=e(1016).polyfill()},1016:function(t,n,e){(function(n,e){/*!
 * @overview es6-promise - a tiny implementation of Promises/A+.
 * @copyright Copyright (c) 2014 Yehuda Katz, Tom Dale, Stefan Penner and contributors (Conversion to ES6 API by Jake Archibald)
 * @license   Licensed under MIT license
 *            See https://raw.githubusercontent.com/stefanpenner/es6-promise/master/LICENSE
 * @version   v4.2.4+314e4831
 */
!function(n,e){t.exports=e()}(0,function(){"use strict";function t(t){var n=typeof t;return null!==t&&("object"===n||"function"===n)}function r(t){return"function"==typeof t}function o(t){W=t}function i(t){z=t}function u(){return void 0!==U?function(){U(c)}:s()}function s(){var t=setTimeout;return function(){return t(c,1)}}function c(){for(var t=0;t<N;t+=2){(0,Q[t])(Q[t+1]),Q[t]=void 0,Q[t+1]=void 0}N=0}function a(t,n){var e=this,r=new this.constructor(l);void 0===r[V]&&S(r);var o=e._state;if(o){var i=arguments[o-1];z(function(){return x(o,r,i,e._result)})}else j(e,r,t,n);return r}function f(t){var n=this;if(t&&"object"==typeof t&&t.constructor===n)return t;var e=new n(l);return b(e,t),e}function l(){}function h(){return new TypeError("You cannot resolve a promise with itself")}function p(){return new TypeError("A promises callback cannot return that same promise.")}function v(t){try{return t.then}catch(t){return tt.error=t,tt}}function d(t,n,e,r){try{t.call(n,e,r)}catch(t){return t}}function y(t,n,e){z(function(t){var r=!1,o=d(e,n,function(e){r||(r=!0,n!==e?b(t,e):g(t,e))},function(n){r||(r=!0,T(t,n))},"Settle: "+(t._label||" unknown promise"));!r&&o&&(r=!0,T(t,o))},t)}function _(t,n){n._state===Z?g(t,n._result):n._state===$?T(t,n._result):j(n,void 0,function(n){return b(t,n)},function(n){return T(t,n)})}function m(t,n,e){n.constructor===t.constructor&&e===a&&n.constructor.resolve===f?_(t,n):e===tt?(T(t,tt.error),tt.error=null):void 0===e?g(t,n):r(e)?y(t,n,e):g(t,n)}function b(n,e){n===e?T(n,h()):t(e)?m(n,e,v(e)):g(n,e)}function w(t){t._onerror&&t._onerror(t._result),A(t)}function g(t,n){t._state===X&&(t._result=n,t._state=Z,0!==t._subscribers.length&&z(A,t))}function T(t,n){t._state===X&&(t._state=$,t._result=n,z(w,t))}function j(t,n,e,r){var o=t._subscribers,i=o.length;t._onerror=null,o[i]=n,o[i+Z]=e,o[i+$]=r,0===i&&t._state&&z(A,t)}function A(t){var n=t._subscribers,e=t._state;if(0!==n.length){for(var r=void 0,o=void 0,i=t._result,u=0;u<n.length;u+=3)r=n[u],o=n[u+e],r?x(e,r,o,i):o(i);t._subscribers.length=0}}function O(t,n){try{return t(n)}catch(t){return tt.error=t,tt}}function x(t,n,e,o){var i=r(e),u=void 0,s=void 0,c=void 0,a=void 0;if(i){if(u=O(e,o),u===tt?(a=!0,s=u.error,u.error=null):c=!0,n===u)return void T(n,p())}else u=o,c=!0;n._state!==X||(i&&c?b(n,u):a?T(n,s):t===Z?g(n,u):t===$&&T(n,u))}function E(t,n){try{n(function(n){b(t,n)},function(n){T(t,n)})}catch(n){T(t,n)}}function P(){return nt++}function S(t){t[V]=nt++,t._state=void 0,t._result=void 0,t._subscribers=[]}function M(){return new Error("Array Methods must be provided an Array")}function k(t){return new et(this,t).promise}function C(t){var n=this;return new n(K(t)?function(e,r){for(var o=t.length,i=0;i<o;i++)n.resolve(t[i]).then(e,r)}:function(t,n){return n(new TypeError("You must pass an array to race."))})}function L(t){var n=this,e=new n(l);return T(e,t),e}function F(){throw new TypeError("You must pass a resolver function as the first argument to the promise constructor")}function Y(){throw new TypeError("Failed to construct 'Promise': Please use the 'new' operator, this object constructor cannot be called as a function.")}function D(){var t=void 0;if(void 0!==e)t=e;else if("undefined"!=typeof self)t=self;else try{t=Function("return this")()}catch(t){throw new Error("polyfill failed because global object is unavailable in this environment")}var n=t.Promise;if(n){var r=null;try{r=Object.prototype.toString.call(n.resolve())}catch(t){}if("[object Promise]"===r&&!n.cast)return}t.Promise=rt}var q=void 0;q=Array.isArray?Array.isArray:function(t){return"[object Array]"===Object.prototype.toString.call(t)};var K=q,N=0,U=void 0,W=void 0,z=function(t,n){Q[N]=t,Q[N+1]=n,2===(N+=2)&&(W?W(c):R())},B="undefined"!=typeof window?window:void 0,G=B||{},H=G.MutationObserver||G.WebKitMutationObserver,I="undefined"==typeof self&&void 0!==n&&"[object process]"==={}.toString.call(n),J="undefined"!=typeof Uint8ClampedArray&&"undefined"!=typeof importScripts&&"undefined"!=typeof MessageChannel,Q=new Array(1e3),R=void 0;R=I?function(){return function(){return n.nextTick(c)}}():H?function(){var t=0,n=new H(c),e=document.createTextNode("");return n.observe(e,{characterData:!0}),function(){e.data=t=++t%2}}():J?function(){var t=new MessageChannel;return t.port1.onmessage=c,function(){return t.port2.postMessage(0)}}():void 0===B?function(){try{var t=Function("return this")().require("vertx");return U=t.runOnLoop||t.runOnContext,u()}catch(t){return s()}}():s();var V=Math.random().toString(36).substring(2),X=void 0,Z=1,$=2,tt={error:null},nt=0,et=function(){function t(t,n){this._instanceConstructor=t,this.promise=new t(l),this.promise[V]||S(this.promise),K(n)?(this.length=n.length,this._remaining=n.length,this._result=new Array(this.length),0===this.length?g(this.promise,this._result):(this.length=this.length||0,this._enumerate(n),0===this._remaining&&g(this.promise,this._result))):T(this.promise,M())}return t.prototype._enumerate=function(t){for(var n=0;this._state===X&&n<t.length;n++)this._eachEntry(t[n],n)},t.prototype._eachEntry=function(t,n){var e=this._instanceConstructor,r=e.resolve;if(r===f){var o=v(t);if(o===a&&t._state!==X)this._settledAt(t._state,n,t._result);else if("function"!=typeof o)this._remaining--,this._result[n]=t;else if(e===rt){var i=new e(l);m(i,t,o),this._willSettleAt(i,n)}else this._willSettleAt(new e(function(n){return n(t)}),n)}else this._willSettleAt(r(t),n)},t.prototype._settledAt=function(t,n,e){var r=this.promise;r._state===X&&(this._remaining--,t===$?T(r,e):this._result[n]=e),0===this._remaining&&g(r,this._result)},t.prototype._willSettleAt=function(t,n){var e=this;j(t,void 0,function(t){return e._settledAt(Z,n,t)},function(t){return e._settledAt($,n,t)})},t}(),rt=function(){function t(n){this[V]=P(),this._result=this._state=void 0,this._subscribers=[],l!==n&&("function"!=typeof n&&F(),this instanceof t?E(this,n):Y())}return t.prototype.catch=function(t){return this.then(null,t)},t.prototype.finally=function(t){var n=this,e=n.constructor;return n.then(function(n){return e.resolve(t()).then(function(){return n})},function(n){return e.resolve(t()).then(function(){throw n})})},t}();return rt.prototype.then=a,rt.all=k,rt.race=C,rt.resolve=f,rt.reject=L,rt._setScheduler=o,rt._setAsap=i,rt._asap=z,rt.polyfill=D,rt.Promise=rt,rt})}).call(n,e(720),e(1017))},1017:function(t,n){var e;e=function(){return this}();try{e=e||Function("return this")()||(0,eval)("this")}catch(t){"object"==typeof window&&(e=window)}t.exports=e},1018:function(t,n,e){"use strict";e(1019).polyfill()},1019:function(t,n,e){"use strict";function r(t,n){if(void 0===t||null===t)throw new TypeError("Cannot convert first argument to object");for(var e=Object(t),r=1;r<arguments.length;r++){var o=arguments[r];if(void 0!==o&&null!==o)for(var i=Object.keys(Object(o)),u=0,s=i.length;u<s;u++){var c=i[u],a=Object.getOwnPropertyDescriptor(o,c);void 0!==a&&a.enumerable&&(e[c]=o[c])}}return e}function o(){Object.assign||Object.defineProperty(Object,"assign",{enumerable:!1,configurable:!0,writable:!0,value:r})}t.exports={assign:r,polyfill:o}},720:function(t,n){function e(){throw new Error("setTimeout has not been defined")}function r(){throw new Error("clearTimeout has not been defined")}function o(t){if(f===setTimeout)return setTimeout(t,0);if((f===e||!f)&&setTimeout)return f=setTimeout,setTimeout(t,0);try{return f(t,0)}catch(n){try{return f.call(null,t,0)}catch(n){return f.call(this,t,0)}}}function i(t){if(l===clearTimeout)return clearTimeout(t);if((l===r||!l)&&clearTimeout)return l=clearTimeout,clearTimeout(t);try{return l(t)}catch(n){try{return l.call(null,t)}catch(n){return l.call(this,t)}}}function u(){d&&p&&(d=!1,p.length?v=p.concat(v):y=-1,v.length&&s())}function s(){if(!d){var t=o(u);d=!0;for(var n=v.length;n;){for(p=v,v=[];++y<n;)p&&p[y].run();y=-1,n=v.length}p=null,d=!1,i(t)}}function c(t,n){this.fun=t,this.array=n}function a(){}var f,l,h=t.exports={};!function(){try{f="function"==typeof setTimeout?setTimeout:e}catch(t){f=e}try{l="function"==typeof clearTimeout?clearTimeout:r}catch(t){l=r}}();var p,v=[],d=!1,y=-1;h.nextTick=function(t){var n=new Array(arguments.length-1);if(arguments.length>1)for(var e=1;e<arguments.length;e++)n[e-1]=arguments[e];v.push(new c(t,n)),1!==v.length||d||o(s)},c.prototype.run=function(){this.fun.apply(null,this.array)},h.title="browser",h.browser=!0,h.env={},h.argv=[],h.version="",h.versions={},h.on=a,h.addListener=a,h.once=a,h.off=a,h.removeListener=a,h.removeAllListeners=a,h.emit=a,h.prependListener=a,h.prependOnceListener=a,h.listeners=function(t){return[]},h.binding=function(t){throw new Error("process.binding is not supported")},h.cwd=function(){return"/"},h.chdir=function(t){throw new Error("process.chdir is not supported")},h.umask=function(){return 0}}});