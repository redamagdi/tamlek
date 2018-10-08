// jquery-pjax needs `.selector` and `.context` on jQuery objects, both of which
// do not exist in jQuery 3. This file adds them back.
//
// Adapted from from the deletions in this commit (for the file `src/core.js`):
// https://github.com/jquery/jquery-migrate/commit/f26c2930a66d088fb0c4d23a114d1561ed60d744#diff-7eb52b366866677666470e019283c8ea

var originalInit = jQuery.fn.init

jQuery.fn.init = function (selector, context) {
    var ret = originalInit.apply(this, arguments)

    if (selector && selector.selector !== undefined) {
        ret.selector = selector.selector
        ret.context = selector.context
    } else {
        ret.selector = typeof selector === 'string' ? selector : ''
        if (selector) {
            ret.context = selector.nodeType ? selector : context || document
        }
    }

    return ret
}

jQuery.fn.init.prototype = jQuery.fn