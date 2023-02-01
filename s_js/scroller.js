!function(e, t) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function(e) {
        if (!e.document)
            throw new Error("jQuery requires a window with a document");
        return t(e)
    }
    : t(e)
}("undefined" != typeof window ? window : this, function(a, b) {
    function s(e) {
        var t = "length"in e && e.length
          , r = n.type(e);
        return "function" === r || n.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === r || 0 === t || "number" == typeof t && t > 0 && t - 1 in e
    }
    function x(e, t, r) {
        if (n.isFunction(t))
            return n.grep(e, function(e, n) {
                return !!t.call(e, n, e) !== r
            });
        if (t.nodeType)
            return n.grep(e, function(e) {
                return e === t !== r
            });
        if ("string" == typeof t) {
            if (w.test(t))
                return n.filter(t, e, r);
            t = n.filter(t, e)
        }
        return n.grep(e, function(e) {
            return g.call(t, e) >= 0 !== r
        })
    }
    function D(e, t) {
        while ((e = e[t]) && 1 !== e.nodeType)
            ;
        return e
    }
    function G(e) {
        var t = F[e] = {};
        return n.each(e.match(E) || [], function(e, n) {
            t[n] = !0
        }),
        t
    }
    function I() {
        l.removeEventListener("DOMContentLoaded", I, !1),
        a.removeEventListener("load", I, !1),
        n.ready()
    }
    function K() {
        Object.defineProperty(this.cache = {}, 0, {
            get: function() {
                return {}
            }
        }),
        this.expando = n.expando + K.uid++
    }
    function P(e, t, r) {
        var i;
        if (void 0 === r && 1 === e.nodeType)
            if (i = "data-" + t.replace(O, "-$1").toLowerCase(),
            r = e.getAttribute(i),
            "string" == typeof r) {
                try {
                    r = "true" === r ? !0 : "false" === r ? !1 : "null" === r ? null : +r + "" === r ? +r : N.test(r) ? n.parseJSON(r) : r
                } catch (s) {}
                M.set(e, t, r)
            } else
                r = void 0;
        return r
    }
    function Z() {
        return !0
    }
    function $() {
        return !1
    }
    function _() {
        try {
            return l.activeElement
        } catch (e) {}
    }
    function ja(e, t) {
        return n.nodeName(e, "table") && n.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
    }
    function ka(e) {
        return e.type = (null !== e.getAttribute("type")) + "/" + e.type,
        e
    }
    function la(e) {
        var t = ga.exec(e.type);
        return t ? e.type = t[1] : e.removeAttribute("type"),
        e
    }
    function ma(e, t) {
        for (var n = 0, r = e.length; r > n; n++)
            L.set(e[n], "globalEval", !t || L.get(t[n], "globalEval"))
    }
    function na(e, t) {
        var r, i, s, o, u, a, f, l;
        if (1 === t.nodeType) {
            if (L.hasData(e) && (o = L.access(e),
            u = L.set(t, o),
            l = o.events)) {
                delete u.handle,
                u.events = {};
                for (s in l)
                    for (r = 0,
                    i = l[s].length; i > r; r++)
                        n.event.add(t, s, l[s][r])
            }
            M.hasData(e) && (a = M.access(e),
            f = n.extend({}, a),
            M.set(t, f))
        }
    }
    function oa(e, t) {
        var r = e.getElementsByTagName ? e.getElementsByTagName(t || "*") : e.querySelectorAll ? e.querySelectorAll(t || "*") : [];
        return void 0 === t || t && n.nodeName(e, t) ? n.merge([e], r) : r
    }
    function pa(e, t) {
        var n = t.nodeName.toLowerCase();
        "input" === n && T.test(e.type) ? t.checked = e.checked : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
    }
    function sa(e, t) {
        var r, i = n(t.createElement(e)).appendTo(t.body), s = a.getDefaultComputedStyle && (r = a.getDefaultComputedStyle(i[0])) ? r.display : n.css(i[0], "display");
        return i.detach(),
        s
    }
    function ta(e) {
        var t = l
          , r = ra[e];
        return r || (r = sa(e, t),
        "none" !== r && r || (qa = (qa || n("<iframe frameborder='0' width='0' height='0'/>")).appendTo(t.documentElement),
        t = qa[0].contentDocument,
        t.write(),
        t.close(),
        r = sa(e, t),
        qa.detach()),
        ra[e] = r),
        r
    }
    function xa(e, t, r) {
        var i, s, o, u, a = e.style;
        return r = r || wa(e),
        r && (u = r.getPropertyValue(t) || r[t]),
        r && ("" !== u || n.contains(e.ownerDocument, e) || (u = n.style(e, t)),
        va.test(u) && ua.test(t) && (i = a.width,
        s = a.minWidth,
        o = a.maxWidth,
        a.minWidth = a.maxWidth = a.width = u,
        u = r.width,
        a.width = i,
        a.minWidth = s,
        a.maxWidth = o)),
        void 0 !== u ? u + "" : u
    }
    function ya(e, t) {
        return {
            get: function() {
                return e() ? void delete this.get : (this.get = t).apply(this, arguments)
            }
        }
    }
    function Fa(e, t) {
        if (t in e)
            return t;
        var n = t[0].toUpperCase() + t.slice(1)
          , r = t
          , i = Ea.length;
        while (i--)
            if (t = Ea[i] + n,
            t in e)
                return t;
        return r
    }
    function Ga(e, t, n) {
        var r = Aa.exec(t);
        return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
    }
    function Ha(e, t, r, i, s) {
        for (var o = r === (i ? "border" : "content") ? 4 : "width" === t ? 1 : 0, u = 0; 4 > o; o += 2)
            "margin" === r && (u += n.css(e, r + R[o], !0, s)),
            i ? ("content" === r && (u -= n.css(e, "padding" + R[o], !0, s)),
            "margin" !== r && (u -= n.css(e, "border" + R[o] + "Width", !0, s))) : (u += n.css(e, "padding" + R[o], !0, s),
            "padding" !== r && (u += n.css(e, "border" + R[o] + "Width", !0, s)));
        return u
    }
    function Ia(e, t, r) {
        var i = !0
          , s = "width" === t ? e.offsetWidth : e.offsetHeight
          , o = wa(e)
          , u = "border-box" === n.css(e, "boxSizing", !1, o);
        if (0 >= s || null == s) {
            if (s = xa(e, t, o),
            (0 > s || null == s) && (s = e.style[t]),
            va.test(s))
                return s;
            i = u && (k.boxSizingReliable() || s === e.style[t]),
            s = parseFloat(s) || 0
        }
        return s + Ha(e, t, r || (u ? "border" : "content"), i, o) + "px"
    }
    function Ja(e, t) {
        for (var r, i, s, o = [], u = 0, a = e.length; a > u; u++)
            i = e[u],
            i.style && (o[u] = L.get(i, "olddisplay"),
            r = i.style.display,
            t ? (o[u] || "none" !== r || (i.style.display = ""),
            "" === i.style.display && S(i) && (o[u] = L.access(i, "olddisplay", ta(i.nodeName)))) : (s = S(i),
            "none" === r && s || L.set(i, "olddisplay", s ? r : n.css(i, "display"))));
        for (u = 0; a > u; u++)
            i = e[u],
            i.style && (t && "none" !== i.style.display && "" !== i.style.display || (i.style.display = t ? o[u] || "" : "none"));
        return e
    }
    function Ka(e, t, n, r, i) {
        return new Ka.prototype.init(e,t,n,r,i)
    }
    function Sa() {
        return setTimeout(function() {
            La = void 0
        }),
        La = n.now()
    }
    function Ta(e, t) {
        var n, r = 0, i = {
            height: e
        };
        for (t = t ? 1 : 0; 4 > r; r += 2 - t)
            n = R[r],
            i["margin" + n] = i["padding" + n] = e;
        return t && (i.opacity = i.width = e),
        i
    }
    function Ua(e, t, n) {
        for (var r, i = (Ra[t] || []).concat(Ra["*"]), s = 0, o = i.length; o > s; s++)
            if (r = i[s].call(n, t, e))
                return r
    }
    function Va(e, t, r) {
        var i, s, o, u, a, f, l, c, h = this, p = {}, d = e.style, v = e.nodeType && S(e), m = L.get(e, "fxshow");
        r.queue || (a = n._queueHooks(e, "fx"),
        null == a.unqueued && (a.unqueued = 0,
        f = a.empty.fire,
        a.empty.fire = function() {
            a.unqueued || f()
        }
        ),
        a.unqueued++,
        h.always(function() {
            h.always(function() {
                a.unqueued--,
                n.queue(e, "fx").length || a.empty.fire()
            })
        })),
        1 === e.nodeType && ("height"in t || "width"in t) && (r.overflow = [d.overflow, d.overflowX, d.overflowY],
        l = n.css(e, "display"),
        c = "none" === l ? L.get(e, "olddisplay") || ta(e.nodeName) : l,
        "inline" === c && "none" === n.css(e, "float") && (d.display = "inline-block")),
        r.overflow && (d.overflow = "hidden",
        h.always(function() {
            d.overflow = r.overflow[0],
            d.overflowX = r.overflow[1],
            d.overflowY = r.overflow[2]
        }));
        for (i in t)
            if (s = t[i],
            Na.exec(s)) {
                if (delete t[i],
                o = o || "toggle" === s,
                s === (v ? "hide" : "show")) {
                    if ("show" !== s || !m || void 0 === m[i])
                        continue;
                    v = !0
                }
                p[i] = m && m[i] || n.style(e, i)
            } else
                l = void 0;
        if (n.isEmptyObject(p))
            "inline" === ("none" === l ? ta(e.nodeName) : l) && (d.display = l);
        else {
            m ? "hidden"in m && (v = m.hidden) : m = L.access(e, "fxshow", {}),
            o && (m.hidden = !v),
            v ? n(e).show() : h.done(function() {
                n(e).hide()
            }),
            h.done(function() {
                var t;
                L.remove(e, "fxshow");
                for (t in p)
                    n.style(e, t, p[t])
            });
            for (i in p)
                u = Ua(v ? m[i] : 0, i, h),
                i in m || (m[i] = u.start,
                v && (u.end = u.start,
                u.start = "width" === i || "height" === i ? 1 : 0))
        }
    }
    function Wa(e, t) {
        var r, i, s, o, u;
        for (r in e)
            if (i = n.camelCase(r),
            s = t[i],
            o = e[r],
            n.isArray(o) && (s = o[1],
            o = e[r] = o[0]),
            r !== i && (e[i] = o,
            delete e[r]),
            u = n.cssHooks[i],
            u && "expand"in u) {
                o = u.expand(o),
                delete e[i];
                for (r in o)
                    r in e || (e[r] = o[r],
                    t[r] = s)
            } else
                t[i] = s
    }
    function Xa(e, t, r) {
        var i, s, o = 0, u = Qa.length, a = n.Deferred().always(function() {
            delete f.elem
        }), f = function() {
            if (s)
                return !1;
            for (var t = La || Sa(), n = Math.max(0, l.startTime + l.duration - t), r = n / l.duration || 0, i = 1 - r, o = 0, u = l.tweens.length; u > o; o++)
                l.tweens[o].run(i);
            return a.notifyWith(e, [l, i, n]),
            1 > i && u ? n : (a.resolveWith(e, [l]),
            !1)
        }, l = a.promise({
            elem: e,
            props: n.extend({}, t),
            opts: n.extend(!0, {
                specialEasing: {}
            }, r),
            originalProperties: t,
            originalOptions: r,
            startTime: La || Sa(),
            duration: r.duration,
            tweens: [],
            createTween: function(t, r) {
                var i = n.Tween(e, l.opts, t, r, l.opts.specialEasing[t] || l.opts.easing);
                return l.tweens.push(i),
                i
            },
            stop: function(t) {
                var n = 0
                  , r = t ? l.tweens.length : 0;
                if (s)
                    return this;
                for (s = !0; r > n; n++)
                    l.tweens[n].run(1);
                return t ? a.resolveWith(e, [l, t]) : a.rejectWith(e, [l, t]),
                this
            }
        }), c = l.props;
        for (Wa(c, l.opts.specialEasing); u > o; o++)
            if (i = Qa[o].call(l, e, c, l.opts))
                return i;
        return n.map(c, Ua, l),
        n.isFunction(l.opts.start) && l.opts.start.call(e, l),
        n.fx.timer(n.extend(f, {
            elem: e,
            anim: l,
            queue: l.opts.queue
        })),
        l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always)
    }
    function qb(e) {
        return function(t, r) {
            "string" != typeof t && (r = t,
            t = "*");
            var i, s = 0, o = t.toLowerCase().match(E) || [];
            if (n.isFunction(r))
                while (i = o[s++])
                    "+" === i[0] ? (i = i.slice(1) || "*",
                    (e[i] = e[i] || []).unshift(r)) : (e[i] = e[i] || []).push(r)
        }
    }
    function rb(e, t, r, i) {
        function u(l) {
            var h;
            return s[l] = !0,
            n.each(e[l] || [], function(e, n) {
                var a = n(t, r, i);
                return "string" != typeof a || o || s[a] ? o ? !(h = a) : void 0 : (t.dataTypes.unshift(a),
                u(a),
                !1)
            }),
            h
        }
        var s = {}
          , o = e === mb;
        return u(t.dataTypes[0]) || !s["*"] && u("*")
    }
    function sb(e, t) {
        var r, i, s = n.ajaxSettings.flatOptions || {};
        for (r in t)
            void 0 !== t[r] && ((s[r] ? e : i || (i = {}))[r] = t[r]);
        return i && n.extend(!0, e, i),
        e
    }
    function tb(e, t, n) {
        var r, i, s, o, u = e.contents, a = e.dataTypes;
        while ("*" === a[0])
            a.shift(),
            void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
        if (r)
            for (i in u)
                if (u[i] && u[i].test(r)) {
                    a.unshift(i);
                    break
                }
        if (a[0]in n)
            s = a[0];
        else {
            for (i in n) {
                if (!a[0] || e.converters[i + " " + a[0]]) {
                    s = i;
                    break
                }
                o || (o = i)
            }
            s = s || o
        }
        return s ? (s !== a[0] && a.unshift(s),
        n[s]) : void 0
    }
    function ub(e, t, n, r) {
        var i, s, o, u, a, f = {}, l = e.dataTypes.slice();
        if (l[1])
            for (o in e.converters)
                f[o.toLowerCase()] = e.converters[o];
        s = l.shift();
        while (s)
            if (e.responseFields[s] && (n[e.responseFields[s]] = t),
            !a && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)),
            a = s,
            s = l.shift())
                if ("*" === s)
                    s = a;
                else if ("*" !== a && a !== s) {
                    if (o = f[a + " " + s] || f["* " + s],
                    !o)
                        for (i in f)
                            if (u = i.split(" "),
                            u[1] === s && (o = f[a + " " + u[0]] || f["* " + u[0]])) {
                                o === !0 ? o = f[i] : f[i] !== !0 && (s = u[0],
                                l.unshift(u[1]));
                                break
                            }
                    if (o !== !0)
                        if (o && e["throws"])
                            t = o(t);
                        else
                            try {
                                t = o(t)
                            } catch (c) {
                                return {
                                    state: "parsererror",
                                    error: o ? c : "No conversion from " + a + " to " + s
                                }
                            }
                }
        return {
            state: "success",
            data: t
        }
    }
    function Ab(e, t, r, i) {
        var s;
        if (n.isArray(t))
            n.each(t, function(t, n) {
                r || wb.test(e) ? i(e, n) : Ab(e + "[" + ("object" == typeof n ? t : "") + "]", n, r, i)
            });
        else if (r || "object" !== n.type(t))
            i(e, t);
        else
            for (s in t)
                Ab(e + "[" + s + "]", t[s], r, i)
    }
    function Jb(e) {
        return n.isWindow(e) ? e : 9 === e.nodeType && e.defaultView
    }
    var c = []
      , d = c.slice
      , e = c.concat
      , f = c.push
      , g = c.indexOf
      , h = {}
      , i = h.toString
      , j = h.hasOwnProperty
      , k = {}
      , l = a.document
      , m = "2.1.4"
      , n = function(e, t) {
        return new n.fn.init(e,t)
    }
      , o = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g
      , p = /^-ms-/
      , q = /-([\da-z])/gi
      , r = function(e, t) {
        return t.toUpperCase()
    };
    n.fn = n.prototype = {
        jquery: m,
        constructor: n,
        selector: "",
        length: 0,
        toArray: function() {
            return d.call(this)
        },
        get: function(e) {
            return null != e ? 0 > e ? this[e + this.length] : this[e] : d.call(this)
        },
        pushStack: function(e) {
            var t = n.merge(this.constructor(), e);
            return t.prevObject = this,
            t.context = this.context,
            t
        },
        each: function(e, t) {
            return n.each(this, e, t)
        },
        map: function(e) {
            return this.pushStack(n.map(this, function(t, n) {
                return e.call(t, n, t)
            }))
        },
        slice: function() {
            return this.pushStack(d.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        eq: function(e) {
            var t = this.length
              , n = +e + (0 > e ? t : 0);
            return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
        },
        end: function() {
            return this.prevObject || this.constructor(null)
        },
        push: f,
        sort: c.sort,
        splice: c.splice
    },
    n.extend = n.fn.extend = function() {
        var e, t, r, i, s, o, u = arguments[0] || {}, a = 1, f = arguments.length, l = !1;
        for ("boolean" == typeof u && (l = u,
        u = arguments[a] || {},
        a++),
        "object" == typeof u || n.isFunction(u) || (u = {}),
        a === f && (u = this,
        a--); f > a; a++)
            if (null != (e = arguments[a]))
                for (t in e)
                    r = u[t],
                    i = e[t],
                    u !== i && (l && i && (n.isPlainObject(i) || (s = n.isArray(i))) ? (s ? (s = !1,
                    o = r && n.isArray(r) ? r : []) : o = r && n.isPlainObject(r) ? r : {},
                    u[t] = n.extend(l, o, i)) : void 0 !== i && (u[t] = i));
        return u
    }
    ,
    n.extend({
        expando: "jQuery" + (m + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function(e) {
            throw new Error(e)
        },
        noop: function() {},
        isFunction: function(e) {
            return "function" === n.type(e)
        },
        isArray: Array.isArray,
        isWindow: function(e) {
            return null != e && e === e.window
        },
        isNumeric: function(e) {
            return !n.isArray(e) && e - parseFloat(e) + 1 >= 0
        },
        isPlainObject: function(e) {
            return "object" !== n.type(e) || e.nodeType || n.isWindow(e) ? !1 : e.constructor && !j.call(e.constructor.prototype, "isPrototypeOf") ? !1 : !0
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e)
                return !1;
            return !0
        },
        type: function(e) {
            return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? h[i.call(e)] || "object" : typeof e
        },
        globalEval: function(a) {
            var b, c = eval;
            a = n.trim(a),
            a && (1 === a.indexOf("use strict") ? (b = l.createElement("script"),
            b.text = a,
            l.head.appendChild(b).parentNode.removeChild(b)) : c(a))
        },
        camelCase: function(e) {
            return e.replace(p, "ms-").replace(q, r)
        },
        nodeName: function(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
        },
        each: function(e, t, n) {
            var r, i = 0, o = e.length, u = s(e);
            if (n) {
                if (u) {
                    for (; o > i; i++)
                        if (r = t.apply(e[i], n),
                        r === !1)
                            break
                } else
                    for (i in e)
                        if (r = t.apply(e[i], n),
                        r === !1)
                            break
            } else if (u) {
                for (; o > i; i++)
                    if (r = t.call(e[i], i, e[i]),
                    r === !1)
                        break
            } else
                for (i in e)
                    if (r = t.call(e[i], i, e[i]),
                    r === !1)
                        break;
            return e
        },
        trim: function(e) {
            return null == e ? "" : (e + "").replace(o, "")
        },
        makeArray: function(e, t) {
            var r = t || [];
            return null != e && (s(Object(e)) ? n.merge(r, "string" == typeof e ? [e] : e) : f.call(r, e)),
            r
        },
        inArray: function(e, t, n) {
            return null == t ? -1 : g.call(t, e, n)
        },
        merge: function(e, t) {
            for (var n = +t.length, r = 0, i = e.length; n > r; r++)
                e[i++] = t[r];
            return e.length = i,
            e
        },
        grep: function(e, t, n) {
            for (var r, i = [], s = 0, o = e.length, u = !n; o > s; s++)
                r = !t(e[s], s),
                r !== u && i.push(e[s]);
            return i
        },
        map: function(t, n, r) {
            var i, o = 0, u = t.length, a = s(t), f = [];
            if (a)
                for (; u > o; o++)
                    i = n(t[o], o, r),
                    null != i && f.push(i);
            else
                for (o in t)
                    i = n(t[o], o, r),
                    null != i && f.push(i);
            return e.apply([], f)
        },
        guid: 1,
        proxy: function(e, t) {
            var r, i, s;
            return "string" == typeof t && (r = e[t],
            t = e,
            e = r),
            n.isFunction(e) ? (i = d.call(arguments, 2),
            s = function() {
                return e.apply(t || this, i.concat(d.call(arguments)))
            }
            ,
            s.guid = e.guid = e.guid || n.guid++,
            s) : void 0
        },
        now: Date.now,
        support: k
    }),
    n.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
        h["[object " + t + "]"] = t.toLowerCase()
    });
    var t = function(e) {
        function ot(e, t, r, i) {
            var s, u, f, l, c, d, g, y, S, x;
            if ((t ? t.ownerDocument || t : E) !== p && h(t),
            t = t || p,
            r = r || [],
            l = t.nodeType,
            "string" != typeof e || !e || 1 !== l && 9 !== l && 11 !== l)
                return r;
            if (!i && v) {
                if (11 !== l && (s = Z.exec(e)))
                    if (f = s[1]) {
                        if (9 === l) {
                            if (u = t.getElementById(f),
                            !u || !u.parentNode)
                                return r;
                            if (u.id === f)
                                return r.push(u),
                                r
                        } else if (t.ownerDocument && (u = t.ownerDocument.getElementById(f)) && b(t, u) && u.id === f)
                            return r.push(u),
                            r
                    } else {
                        if (s[2])
                            return D.apply(r, t.getElementsByTagName(e)),
                            r;
                        if ((f = s[3]) && n.getElementsByClassName)
                            return D.apply(r, t.getElementsByClassName(f)),
                            r
                    }
                if (n.qsa && (!m || !m.test(e))) {
                    if (y = g = w,
                    S = t,
                    x = 1 !== l && e,
                    1 === l && "object" !== t.nodeName.toLowerCase()) {
                        d = o(e),
                        (g = t.getAttribute("id")) ? y = g.replace(tt, "\\$&") : t.setAttribute("id", y),
                        y = "[id='" + y + "'] ",
                        c = d.length;
                        while (c--)
                            d[c] = y + gt(d[c]);
                        S = et.test(e) && vt(t.parentNode) || t,
                        x = d.join(",")
                    }
                    if (x)
                        try {
                            return D.apply(r, S.querySelectorAll(x)),
                            r
                        } catch (T) {} finally {
                            g || t.removeAttribute("id")
                        }
                }
            }
            return a(e.replace(z, "$1"), t, r, i)
        }
        function ut() {
            function t(n, i) {
                return e.push(n + " ") > r.cacheLength && delete t[e.shift()],
                t[n + " "] = i
            }
            var e = [];
            return t
        }
        function at(e) {
            return e[w] = !0,
            e
        }
        function ft(e) {
            var t = p.createElement("div");
            try {
                return !!e(t)
            } catch (n) {
                return !1
            } finally {
                t.parentNode && t.parentNode.removeChild(t),
                t = null
            }
        }
        function lt(e, t) {
            var n = e.split("|")
              , i = e.length;
            while (i--)
                r.attrHandle[n[i]] = t
        }
        function ct(e, t) {
            var n = t && e
              , r = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || L) - (~e.sourceIndex || L);
            if (r)
                return r;
            if (n)
                while (n = n.nextSibling)
                    if (n === t)
                        return -1;
            return e ? 1 : -1
        }
        function ht(e) {
            return function(t) {
                var n = t.nodeName.toLowerCase();
                return "input" === n && t.type === e
            }
        }
        function pt(e) {
            return function(t) {
                var n = t.nodeName.toLowerCase();
                return ("input" === n || "button" === n) && t.type === e
            }
        }
        function dt(e) {
            return at(function(t) {
                return t = +t,
                at(function(n, r) {
                    var i, s = e([], n.length, t), o = s.length;
                    while (o--)
                        n[i = s[o]] && (n[i] = !(r[i] = n[i]))
                })
            })
        }
        function vt(e) {
            return e && "undefined" != typeof e.getElementsByTagName && e
        }
        function mt() {}
        function gt(e) {
            for (var t = 0, n = e.length, r = ""; n > t; t++)
                r += e[t].value;
            return r
        }
        function yt(e, t, n) {
            var r = t.dir
              , i = n && "parentNode" === r
              , s = x++;
            return t.first ? function(t, n, s) {
                while (t = t[r])
                    if (1 === t.nodeType || i)
                        return e(t, n, s)
            }
            : function(t, n, o) {
                var u, a, f = [S, s];
                if (o) {
                    while (t = t[r])
                        if ((1 === t.nodeType || i) && e(t, n, o))
                            return !0
                } else
                    while (t = t[r])
                        if (1 === t.nodeType || i) {
                            if (a = t[w] || (t[w] = {}),
                            (u = a[r]) && u[0] === S && u[1] === s)
                                return f[2] = u[2];
                            if (a[r] = f,
                            f[2] = e(t, n, o))
                                return !0
                        }
            }
        }
        function bt(e) {
            return e.length > 1 ? function(t, n, r) {
                var i = e.length;
                while (i--)
                    if (!e[i](t, n, r))
                        return !1;
                return !0
            }
            : e[0]
        }
        function wt(e, t, n) {
            for (var r = 0, i = t.length; i > r; r++)
                ot(e, t[r], n);
            return n
        }
        function Et(e, t, n, r, i) {
            for (var s, o = [], u = 0, a = e.length, f = null != t; a > u; u++)
                (s = e[u]) && (!n || n(s, r, i)) && (o.push(s),
                f && t.push(u));
            return o
        }
        function St(e, t, n, r, i, s) {
            return r && !r[w] && (r = St(r)),
            i && !i[w] && (i = St(i, s)),
            at(function(s, o, u, a) {
                var f, l, c, h = [], p = [], d = o.length, v = s || wt(t || "*", u.nodeType ? [u] : u, []), m = !e || !s && t ? v : Et(v, h, e, u, a), g = n ? i || (s ? e : d || r) ? [] : o : m;
                if (n && n(m, g, u, a),
                r) {
                    f = Et(g, p),
                    r(f, [], u, a),
                    l = f.length;
                    while (l--)
                        (c = f[l]) && (g[p[l]] = !(m[p[l]] = c))
                }
                if (s) {
                    if (i || e) {
                        if (i) {
                            f = [],
                            l = g.length;
                            while (l--)
                                (c = g[l]) && f.push(m[l] = c);
                            i(null, g = [], f, a)
                        }
                        l = g.length;
                        while (l--)
                            (c = g[l]) && (f = i ? H(s, c) : h[l]) > -1 && (s[f] = !(o[f] = c))
                    }
                } else
                    g = Et(g === o ? g.splice(d, g.length) : g),
                    i ? i(null, o, g, a) : D.apply(o, g)
            })
        }
        function xt(e) {
            for (var t, n, i, s = e.length, o = r.relative[e[0].type], u = o || r.relative[" "], a = o ? 1 : 0, l = yt(function(e) {
                return e === t
            }, u, !0), c = yt(function(e) {
                return H(t, e) > -1
            }, u, !0), h = [function(e, n, r) {
                var i = !o && (r || n !== f) || ((t = n).nodeType ? l(e, n, r) : c(e, n, r));
                return t = null,
                i
            }
            ]; s > a; a++)
                if (n = r.relative[e[a].type])
                    h = [yt(bt(h), n)];
                else {
                    if (n = r.filter[e[a].type].apply(null, e[a].matches),
                    n[w]) {
                        for (i = ++a; s > i; i++)
                            if (r.relative[e[i].type])
                                break;
                        return St(a > 1 && bt(h), a > 1 && gt(e.slice(0, a - 1).concat({
                            value: " " === e[a - 2].type ? "*" : ""
                        })).replace(z, "$1"), n, i > a && xt(e.slice(a, i)), s > i && xt(e = e.slice(i)), s > i && gt(e))
                    }
                    h.push(n)
                }
            return bt(h)
        }
        function Tt(e, t) {
            var n = t.length > 0
              , i = e.length > 0
              , s = function(s, o, u, a, l) {
                var c, h, d, v = 0, m = "0", g = s && [], y = [], b = f, w = s || i && r.find.TAG("*", l), E = S += null == b ? 1 : Math.random() || .1, x = w.length;
                for (l && (f = o !== p && o); m !== x && null != (c = w[m]); m++) {
                    if (i && c) {
                        h = 0;
                        while (d = e[h++])
                            if (d(c, o, u)) {
                                a.push(c);
                                break
                            }
                        l && (S = E)
                    }
                    n && ((c = !d && c) && v--,
                    s && g.push(c))
                }
                if (v += m,
                n && m !== v) {
                    h = 0;
                    while (d = t[h++])
                        d(g, y, o, u);
                    if (s) {
                        if (v > 0)
                            while (m--)
                                g[m] || y[m] || (y[m] = M.call(a));
                        y = Et(y)
                    }
                    D.apply(a, y),
                    l && !s && y.length > 0 && v + t.length > 1 && ot.uniqueSort(a)
                }
                return l && (S = E,
                f = b),
                g
            };
            return n ? at(s) : s
        }
        var t, n, r, i, s, o, u, a, f, l, c, h, p, d, v, m, g, y, b, w = "sizzle" + 1 * new Date, E = e.document, S = 0, x = 0, T = ut(), N = ut(), C = ut(), k = function(e, t) {
            return e === t && (c = !0),
            0
        }, L = 1 << 31, A = {}.hasOwnProperty, O = [], M = O.pop, _ = O.push, D = O.push, P = O.slice, H = function(e, t) {
            for (var n = 0, r = e.length; r > n; n++)
                if (e[n] === t)
                    return n;
            return -1
        }, B = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", j = "[\\x20\\t\\r\\n\\f]", F = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+", I = F.replace("w", "w#"), q = "\\[" + j + "*(" + F + ")(?:" + j + "*([*^$|!~]?=)" + j + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + I + "))|)" + j + "*\\]", R = ":(" + F + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + q + ")*)|.*)\\)|)", U = new RegExp(j + "+","g"), z = new RegExp("^" + j + "+|((?:^|[^\\\\])(?:\\\\.)*)" + j + "+$","g"), W = new RegExp("^" + j + "*," + j + "*"), X = new RegExp("^" + j + "*([>+~]|" + j + ")" + j + "*"), V = new RegExp("=" + j + "*([^\\]'\"]*?)" + j + "*\\]","g"), $ = new RegExp(R), J = new RegExp("^" + I + "$"), K = {
            ID: new RegExp("^#(" + F + ")"),
            CLASS: new RegExp("^\\.(" + F + ")"),
            TAG: new RegExp("^(" + F.replace("w", "w*") + ")"),
            ATTR: new RegExp("^" + q),
            PSEUDO: new RegExp("^" + R),
            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + j + "*(even|odd|(([+-]|)(\\d*)n|)" + j + "*(?:([+-]|)" + j + "*(\\d+)|))" + j + "*\\)|)","i"),
            bool: new RegExp("^(?:" + B + ")$","i"),
            needsContext: new RegExp("^" + j + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + j + "*((?:-\\d)?\\d*)" + j + "*\\)|)(?=[^-]|$)","i")
        }, Q = /^(?:input|select|textarea|button)$/i, G = /^h\d$/i, Y = /^[^{]+\{\s*\[native \w/, Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, et = /[+~]/, tt = /'|\\/g, nt = new RegExp("\\\\([\\da-f]{1,6}" + j + "?|(" + j + ")|.)","ig"), rt = function(e, t, n) {
            var r = "0x" + t - 65536;
            return r !== r || n ? t : 0 > r ? String.fromCharCode(r + 65536) : String.fromCharCode(r >> 10 | 55296, 1023 & r | 56320)
        }, it = function() {
            h()
        };
        try {
            D.apply(O = P.call(E.childNodes), E.childNodes),
            O[E.childNodes.length].nodeType
        } catch (st) {
            D = {
                apply: O.length ? function(e, t) {
                    _.apply(e, P.call(t))
                }
                : function(e, t) {
                    var n = e.length
                      , r = 0;
                    while (e[n++] = t[r++])
                        ;
                    e.length = n - 1
                }
            }
        }
        n = ot.support = {},
        s = ot.isXML = function(e) {
            var t = e && (e.ownerDocument || e).documentElement;
            return t ? "HTML" !== t.nodeName : !1
        }
        ,
        h = ot.setDocument = function(e) {
            var t, i, o = e ? e.ownerDocument || e : E;
            return o !== p && 9 === o.nodeType && o.documentElement ? (p = o,
            d = o.documentElement,
            i = o.defaultView,
            i && i !== i.top && (i.addEventListener ? i.addEventListener("unload", it, !1) : i.attachEvent && i.attachEvent("onunload", it)),
            v = !s(o),
            n.attributes = ft(function(e) {
                return e.className = "i",
                !e.getAttribute("className")
            }),
            n.getElementsByTagName = ft(function(e) {
                return e.appendChild(o.createComment("")),
                !e.getElementsByTagName("*").length
            }),
            n.getElementsByClassName = Y.test(o.getElementsByClassName),
            n.getById = ft(function(e) {
                return d.appendChild(e).id = w,
                !o.getElementsByName || !o.getElementsByName(w).length
            }),
            n.getById ? (r.find.ID = function(e, t) {
                if ("undefined" != typeof t.getElementById && v) {
                    var n = t.getElementById(e);
                    return n && n.parentNode ? [n] : []
                }
            }
            ,
            r.filter.ID = function(e) {
                var t = e.replace(nt, rt);
                return function(e) {
                    return e.getAttribute("id") === t
                }
            }
            ) : (delete r.find.ID,
            r.filter.ID = function(e) {
                var t = e.replace(nt, rt);
                return function(e) {
                    var n = "undefined" != typeof e.getAttributeNode && e.getAttributeNode("id");
                    return n && n.value === t
                }
            }
            ),
            r.find.TAG = n.getElementsByTagName ? function(e, t) {
                return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0
            }
            : function(e, t) {
                var n, r = [], i = 0, s = t.getElementsByTagName(e);
                if ("*" === e) {
                    while (n = s[i++])
                        1 === n.nodeType && r.push(n);
                    return r
                }
                return s
            }
            ,
            r.find.CLASS = n.getElementsByClassName && function(e, t) {
                return v ? t.getElementsByClassName(e) : void 0
            }
            ,
            g = [],
            m = [],
            (n.qsa = Y.test(o.querySelectorAll)) && (ft(function(e) {
                d.appendChild(e).innerHTML = "<a id='" + w + "'></a><select id='" + w + "-\f]' msallowcapture=''><option selected=''></option></select>",
                e.querySelectorAll("[msallowcapture^='']").length && m.push("[*^$]=" + j + "*(?:''|\"\")"),
                e.querySelectorAll("[selected]").length || m.push("\\[" + j + "*(?:value|" + B + ")"),
                e.querySelectorAll("[id~=" + w + "-]").length || m.push("~="),
                e.querySelectorAll(":checked").length || m.push(":checked"),
                e.querySelectorAll("a#" + w + "+*").length || m.push(".#.+[+~]")
            }),
            ft(function(e) {
                var t = o.createElement("input");
                t.setAttribute("type", "hidden"),
                e.appendChild(t).setAttribute("name", "D"),
                e.querySelectorAll("[name=d]").length && m.push("name" + j + "*[*^$|!~]?="),
                e.querySelectorAll(":enabled").length || m.push(":enabled", ":disabled"),
                e.querySelectorAll("*,:x"),
                m.push(",.*:")
            })),
            (n.matchesSelector = Y.test(y = d.matches || d.webkitMatchesSelector || d.mozMatchesSelector || d.oMatchesSelector || d.msMatchesSelector)) && ft(function(e) {
                n.disconnectedMatch = y.call(e, "div"),
                y.call(e, "[s!='']:x"),
                g.push("!=", R)
            }),
            m = m.length && new RegExp(m.join("|")),
            g = g.length && new RegExp(g.join("|")),
            t = Y.test(d.compareDocumentPosition),
            b = t || Y.test(d.contains) ? function(e, t) {
                var n = 9 === e.nodeType ? e.documentElement : e
                  , r = t && t.parentNode;
                return e === r || !!r && 1 === r.nodeType && !!(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r))
            }
            : function(e, t) {
                if (t)
                    while (t = t.parentNode)
                        if (t === e)
                            return !0;
                return !1
            }
            ,
            k = t ? function(e, t) {
                if (e === t)
                    return c = !0,
                    0;
                var r = !e.compareDocumentPosition - !t.compareDocumentPosition;
                return r ? r : (r = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1,
                1 & r || !n.sortDetached && t.compareDocumentPosition(e) === r ? e === o || e.ownerDocument === E && b(E, e) ? -1 : t === o || t.ownerDocument === E && b(E, t) ? 1 : l ? H(l, e) - H(l, t) : 0 : 4 & r ? -1 : 1)
            }
            : function(e, t) {
                if (e === t)
                    return c = !0,
                    0;
                var n, r = 0, i = e.parentNode, s = t.parentNode, u = [e], a = [t];
                if (!i || !s)
                    return e === o ? -1 : t === o ? 1 : i ? -1 : s ? 1 : l ? H(l, e) - H(l, t) : 0;
                if (i === s)
                    return ct(e, t);
                n = e;
                while (n = n.parentNode)
                    u.unshift(n);
                n = t;
                while (n = n.parentNode)
                    a.unshift(n);
                while (u[r] === a[r])
                    r++;
                return r ? ct(u[r], a[r]) : u[r] === E ? -1 : a[r] === E ? 1 : 0
            }
            ,
            o) : p
        }
        ,
        ot.matches = function(e, t) {
            return ot(e, null, null, t)
        }
        ,
        ot.matchesSelector = function(e, t) {
            if ((e.ownerDocument || e) !== p && h(e),
            t = t.replace(V, "='$1']"),
            !(!n.matchesSelector || !v || g && g.test(t) || m && m.test(t)))
                try {
                    var r = y.call(e, t);
                    if (r || n.disconnectedMatch || e.document && 11 !== e.document.nodeType)
                        return r
                } catch (i) {}
            return ot(t, p, null, [e]).length > 0
        }
        ,
        ot.contains = function(e, t) {
            return (e.ownerDocument || e) !== p && h(e),
            b(e, t)
        }
        ,
        ot.attr = function(e, t) {
            (e.ownerDocument || e) !== p && h(e);
            var i = r.attrHandle[t.toLowerCase()]
              , s = i && A.call(r.attrHandle, t.toLowerCase()) ? i(e, t, !v) : void 0;
            return void 0 !== s ? s : n.attributes || !v ? e.getAttribute(t) : (s = e.getAttributeNode(t)) && s.specified ? s.value : null
        }
        ,
        ot.error = function(e) {
            throw new Error("Syntax error, unrecognized expression: " + e)
        }
        ,
        ot.uniqueSort = function(e) {
            var t, r = [], i = 0, s = 0;
            if (c = !n.detectDuplicates,
            l = !n.sortStable && e.slice(0),
            e.sort(k),
            c) {
                while (t = e[s++])
                    t === e[s] && (i = r.push(s));
                while (i--)
                    e.splice(r[i], 1)
            }
            return l = null,
            e
        }
        ,
        i = ot.getText = function(e) {
            var t, n = "", r = 0, s = e.nodeType;
            if (s) {
                if (1 === s || 9 === s || 11 === s) {
                    if ("string" == typeof e.textContent)
                        return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling)
                        n += i(e)
                } else if (3 === s || 4 === s)
                    return e.nodeValue
            } else
                while (t = e[r++])
                    n += i(t);
            return n
        }
        ,
        r = ot.selectors = {
            cacheLength: 50,
            createPseudo: at,
            match: K,
            attrHandle: {},
            find: {},
            relative: {
                ">": {
                    dir: "parentNode",
                    first: !0
                },
                " ": {
                    dir: "parentNode"
                },
                "+": {
                    dir: "previousSibling",
                    first: !0
                },
                "~": {
                    dir: "previousSibling"
                }
            },
            preFilter: {
                ATTR: function(e) {
                    return e[1] = e[1].replace(nt, rt),
                    e[3] = (e[3] || e[4] || e[5] || "").replace(nt, rt),
                    "~=" === e[2] && (e[3] = " " + e[3] + " "),
                    e.slice(0, 4)
                },
                CHILD: function(e) {
                    return e[1] = e[1].toLowerCase(),
                    "nth" === e[1].slice(0, 3) ? (e[3] || ot.error(e[0]),
                    e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])),
                    e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && ot.error(e[0]),
                    e
                },
                PSEUDO: function(e) {
                    var t, n = !e[6] && e[2];
                    return K.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && $.test(n) && (t = o(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t),
                    e[2] = n.slice(0, t)),
                    e.slice(0, 3))
                }
            },
            filter: {
                TAG: function(e) {
                    var t = e.replace(nt, rt).toLowerCase();
                    return "*" === e ? function() {
                        return !0
                    }
                    : function(e) {
                        return e.nodeName && e.nodeName.toLowerCase() === t
                    }
                },
                CLASS: function(e) {
                    var t = T[e + " "];
                    return t || (t = new RegExp("(^|" + j + ")" + e + "(" + j + "|$)")) && T(e, function(e) {
                        return t.test("string" == typeof e.className && e.className || "undefined" != typeof e.getAttribute && e.getAttribute("class") || "")
                    })
                },
                ATTR: function(e, t, n) {
                    return function(r) {
                        var i = ot.attr(r, e);
                        return null == i ? "!=" === t : t ? (i += "",
                        "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i.replace(U, " ") + " ").indexOf(n) > -1 : "|=" === t ? i === n || i.slice(0, n.length + 1) === n + "-" : !1) : !0
                    }
                },
                CHILD: function(e, t, n, r, i) {
                    var s = "nth" !== e.slice(0, 3)
                      , o = "last" !== e.slice(-4)
                      , u = "of-type" === t;
                    return 1 === r && 0 === i ? function(e) {
                        return !!e.parentNode
                    }
                    : function(t, n, a) {
                        var f, l, c, h, p, d, v = s !== o ? "nextSibling" : "previousSibling", m = t.parentNode, g = u && t.nodeName.toLowerCase(), y = !a && !u;
                        if (m) {
                            if (s) {
                                while (v) {
                                    c = t;
                                    while (c = c[v])
                                        if (u ? c.nodeName.toLowerCase() === g : 1 === c.nodeType)
                                            return !1;
                                    d = v = "only" === e && !d && "nextSibling"
                                }
                                return !0
                            }
                            if (d = [o ? m.firstChild : m.lastChild],
                            o && y) {
                                l = m[w] || (m[w] = {}),
                                f = l[e] || [],
                                p = f[0] === S && f[1],
                                h = f[0] === S && f[2],
                                c = p && m.childNodes[p];
                                while (c = ++p && c && c[v] || (h = p = 0) || d.pop())
                                    if (1 === c.nodeType && ++h && c === t) {
                                        l[e] = [S, p, h];
                                        break
                                    }
                            } else if (y && (f = (t[w] || (t[w] = {}))[e]) && f[0] === S)
                                h = f[1];
                            else
                                while (c = ++p && c && c[v] || (h = p = 0) || d.pop())
                                    if ((u ? c.nodeName.toLowerCase() === g : 1 === c.nodeType) && ++h && (y && ((c[w] || (c[w] = {}))[e] = [S, h]),
                                    c === t))
                                        break;
                            return h -= i,
                            h === r || h % r === 0 && h / r >= 0
                        }
                    }
                },
                PSEUDO: function(e, t) {
                    var n, i = r.pseudos[e] || r.setFilters[e.toLowerCase()] || ot.error("unsupported pseudo: " + e);
                    return i[w] ? i(t) : i.length > 1 ? (n = [e, e, "", t],
                    r.setFilters.hasOwnProperty(e.toLowerCase()) ? at(function(e, n) {
                        var r, s = i(e, t), o = s.length;
                        while (o--)
                            r = H(e, s[o]),
                            e[r] = !(n[r] = s[o])
                    }) : function(e) {
                        return i(e, 0, n)
                    }
                    ) : i
                }
            },
            pseudos: {
                not: at(function(e) {
                    var t = []
                      , n = []
                      , r = u(e.replace(z, "$1"));
                    return r[w] ? at(function(e, t, n, i) {
                        var s, o = r(e, null, i, []), u = e.length;
                        while (u--)
                            (s = o[u]) && (e[u] = !(t[u] = s))
                    }) : function(e, i, s) {
                        return t[0] = e,
                        r(t, null, s, n),
                        t[0] = null,
                        !n.pop()
                    }
                }),
                has: at(function(e) {
                    return function(t) {
                        return ot(e, t).length > 0
                    }
                }),
                contains: at(function(e) {
                    return e = e.replace(nt, rt),
                    function(t) {
                        return (t.textContent || t.innerText || i(t)).indexOf(e) > -1
                    }
                }),
                lang: at(function(e) {
                    return J.test(e || "") || ot.error("unsupported lang: " + e),
                    e = e.replace(nt, rt).toLowerCase(),
                    function(t) {
                        var n;
                        do
                            if (n = v ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang"))
                                return n = n.toLowerCase(),
                                n === e || 0 === n.indexOf(e + "-");
                        while ((t = t.parentNode) && 1 === t.nodeType);
                        return !1
                    }
                }),
                target: function(t) {
                    var n = e.location && e.location.hash;
                    return n && n.slice(1) === t.id
                },
                root: function(e) {
                    return e === d
                },
                focus: function(e) {
                    return e === p.activeElement && (!p.hasFocus || p.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                },
                enabled: function(e) {
                    return e.disabled === !1
                },
                disabled: function(e) {
                    return e.disabled === !0
                },
                checked: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && !!e.checked || "option" === t && !!e.selected
                },
                selected: function(e) {
                    return e.parentNode && e.parentNode.selectedIndex,
                    e.selected === !0
                },
                empty: function(e) {
                    for (e = e.firstChild; e; e = e.nextSibling)
                        if (e.nodeType < 6)
                            return !1;
                    return !0
                },
                parent: function(e) {
                    return !r.pseudos.empty(e)
                },
                header: function(e) {
                    return G.test(e.nodeName)
                },
                input: function(e) {
                    return Q.test(e.nodeName)
                },
                button: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && "button" === e.type || "button" === t
                },
                text: function(e) {
                    var t;
                    return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                },
                first: dt(function() {
                    return [0]
                }),
                last: dt(function(e, t) {
                    return [t - 1]
                }),
                eq: dt(function(e, t, n) {
                    return [0 > n ? n + t : n]
                }),
                even: dt(function(e, t) {
                    for (var n = 0; t > n; n += 2)
                        e.push(n);
                    return e
                }),
                odd: dt(function(e, t) {
                    for (var n = 1; t > n; n += 2)
                        e.push(n);
                    return e
                }),
                lt: dt(function(e, t, n) {
                    for (var r = 0 > n ? n + t : n; --r >= 0; )
                        e.push(r);
                    return e
                }),
                gt: dt(function(e, t, n) {
                    for (var r = 0 > n ? n + t : n; ++r < t; )
                        e.push(r);
                    return e
                })
            }
        },
        r.pseudos.nth = r.pseudos.eq;
        for (t in {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        })
            r.pseudos[t] = ht(t);
        for (t in {
            submit: !0,
            reset: !0
        })
            r.pseudos[t] = pt(t);
        return mt.prototype = r.filters = r.pseudos,
        r.setFilters = new mt,
        o = ot.tokenize = function(e, t) {
            var n, i, s, o, u, a, f, l = N[e + " "];
            if (l)
                return t ? 0 : l.slice(0);
            u = e,
            a = [],
            f = r.preFilter;
            while (u) {
                (!n || (i = W.exec(u))) && (i && (u = u.slice(i[0].length) || u),
                a.push(s = [])),
                n = !1,
                (i = X.exec(u)) && (n = i.shift(),
                s.push({
                    value: n,
                    type: i[0].replace(z, " ")
                }),
                u = u.slice(n.length));
                for (o in r.filter)
                    !(i = K[o].exec(u)) || f[o] && !(i = f[o](i)) || (n = i.shift(),
                    s.push({
                        value: n,
                        type: o,
                        matches: i
                    }),
                    u = u.slice(n.length));
                if (!n)
                    break
            }
            return t ? u.length : u ? ot.error(e) : N(e, a).slice(0)
        }
        ,
        u = ot.compile = function(e, t) {
            var n, r = [], i = [], s = C[e + " "];
            if (!s) {
                t || (t = o(e)),
                n = t.length;
                while (n--)
                    s = xt(t[n]),
                    s[w] ? r.push(s) : i.push(s);
                s = C(e, Tt(i, r)),
                s.selector = e
            }
            return s
        }
        ,
        a = ot.select = function(e, t, i, s) {
            var a, f, l, c, h, p = "function" == typeof e && e, d = !s && o(e = p.selector || e);
            if (i = i || [],
            1 === d.length) {
                if (f = d[0] = d[0].slice(0),
                f.length > 2 && "ID" === (l = f[0]).type && n.getById && 9 === t.nodeType && v && r.relative[f[1].type]) {
                    if (t = (r.find.ID(l.matches[0].replace(nt, rt), t) || [])[0],
                    !t)
                        return i;
                    p && (t = t.parentNode),
                    e = e.slice(f.shift().value.length)
                }
                a = K.needsContext.test(e) ? 0 : f.length;
                while (a--) {
                    if (l = f[a],
                    r.relative[c = l.type])
                        break;
                    if ((h = r.find[c]) && (s = h(l.matches[0].replace(nt, rt), et.test(f[0].type) && vt(t.parentNode) || t))) {
                        if (f.splice(a, 1),
                        e = s.length && gt(f),
                        !e)
                            return D.apply(i, s),
                            i;
                        break
                    }
                }
            }
            return (p || u(e, d))(s, t, !v, i, et.test(e) && vt(t.parentNode) || t),
            i
        }
        ,
        n.sortStable = w.split("").sort(k).join("") === w,
        n.detectDuplicates = !!c,
        h(),
        n.sortDetached = ft(function(e) {
            return 1 & e.compareDocumentPosition(p.createElement("div"))
        }),
        ft(function(e) {
            return e.innerHTML = "<a href='#'></a>",
            "#" === e.firstChild.getAttribute("href")
        }) || lt("type|href|height|width", function(e, t, n) {
            return n ? void 0 : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
        }),
        n.attributes && ft(function(e) {
            return e.innerHTML = "<input/>",
            e.firstChild.setAttribute("value", ""),
            "" === e.firstChild.getAttribute("value")
        }) || lt("value", function(e, t, n) {
            return n || "input" !== e.nodeName.toLowerCase() ? void 0 : e.defaultValue
        }),
        ft(function(e) {
            return null == e.getAttribute("disabled")
        }) || lt(B, function(e, t, n) {
            var r;
            return n ? void 0 : e[t] === !0 ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
        }),
        ot
    }(a);
    n.find = t,
    n.expr = t.selectors,
    n.expr[":"] = n.expr.pseudos,
    n.unique = t.uniqueSort,
    n.text = t.getText,
    n.isXMLDoc = t.isXML,
    n.contains = t.contains;
    var u = n.expr.match.needsContext
      , v = /^<(\w+)\s*\/?>(?:<\/\1>|)$/
      , w = /^.[^:#\[\.,]*$/;
    n.filter = function(e, t, r) {
        var i = t[0];
        return r && (e = ":not(" + e + ")"),
        1 === t.length && 1 === i.nodeType ? n.find.matchesSelector(i, e) ? [i] : [] : n.find.matches(e, n.grep(t, function(e) {
            return 1 === e.nodeType
        }))
    }
    ,
    n.fn.extend({
        find: function(e) {
            var t, r = this.length, i = [], s = this;
            if ("string" != typeof e)
                return this.pushStack(n(e).filter(function() {
                    for (t = 0; r > t; t++)
                        if (n.contains(s[t], this))
                            return !0
                }));
            for (t = 0; r > t; t++)
                n.find(e, s[t], i);
            return i = this.pushStack(r > 1 ? n.unique(i) : i),
            i.selector = this.selector ? this.selector + " " + e : e,
            i
        },
        filter: function(e) {
            return this.pushStack(x(this, e || [], !1))
        },
        not: function(e) {
            return this.pushStack(x(this, e || [], !0))
        },
        is: function(e) {
            return !!x(this, "string" == typeof e && u.test(e) ? n(e) : e || [], !1).length
        }
    });
    var y, z = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/, A = n.fn.init = function(e, t) {
        var r, i;
        if (!e)
            return this;
        if ("string" == typeof e) {
            if (r = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : z.exec(e),
            !r || !r[1] && t)
                return !t || t.jquery ? (t || y).find(e) : this.constructor(t).find(e);
            if (r[1]) {
                if (t = t instanceof n ? t[0] : t,
                n.merge(this, n.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : l, !0)),
                v.test(r[1]) && n.isPlainObject(t))
                    for (r in t)
                        n.isFunction(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                return this
            }
            return i = l.getElementById(r[2]),
            i && i.parentNode && (this.length = 1,
            this[0] = i),
            this.context = l,
            this.selector = e,
            this
        }
        return e.nodeType ? (this.context = this[0] = e,
        this.length = 1,
        this) : n.isFunction(e) ? "undefined" != typeof y.ready ? y.ready(e) : e(n) : (void 0 !== e.selector && (this.selector = e.selector,
        this.context = e.context),
        n.makeArray(e, this))
    }
    ;
    A.prototype = n.fn,
    y = n(l);
    var B = /^(?:parents|prev(?:Until|All))/
      , C = {
        children: !0,
        contents: !0,
        next: !0,
        prev: !0
    };
    n.extend({
        dir: function(e, t, r) {
            var i = []
              , s = void 0 !== r;
            while ((e = e[t]) && 9 !== e.nodeType)
                if (1 === e.nodeType) {
                    if (s && n(e).is(r))
                        break;
                    i.push(e)
                }
            return i
        },
        sibling: function(e, t) {
            for (var n = []; e; e = e.nextSibling)
                1 === e.nodeType && e !== t && n.push(e);
            return n
        }
    }),
    n.fn.extend({
        has: function(e) {
            var t = n(e, this)
              , r = t.length;
            return this.filter(function() {
                for (var e = 0; r > e; e++)
                    if (n.contains(this, t[e]))
                        return !0
            })
        },
        closest: function(e, t) {
            for (var r, i = 0, s = this.length, o = [], a = u.test(e) || "string" != typeof e ? n(e, t || this.context) : 0; s > i; i++)
                for (r = this[i]; r && r !== t; r = r.parentNode)
                    if (r.nodeType < 11 && (a ? a.index(r) > -1 : 1 === r.nodeType && n.find.matchesSelector(r, e))) {
                        o.push(r);
                        break
                    }
            return this.pushStack(o.length > 1 ? n.unique(o) : o)
        },
        index: function(e) {
            return e ? "string" == typeof e ? g.call(n(e), this[0]) : g.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            return this.pushStack(n.unique(n.merge(this.get(), n(e, t))))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    }),
    n.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return n.dir(e, "parentNode")
        },
        parentsUntil: function(e, t, r) {
            return n.dir(e, "parentNode", r)
        },
        next: function(e) {
            return D(e, "nextSibling")
        },
        prev: function(e) {
            return D(e, "previousSibling")
        },
        nextAll: function(e) {
            return n.dir(e, "nextSibling")
        },
        prevAll: function(e) {
            return n.dir(e, "previousSibling")
        },
        nextUntil: function(e, t, r) {
            return n.dir(e, "nextSibling", r)
        },
        prevUntil: function(e, t, r) {
            return n.dir(e, "previousSibling", r)
        },
        siblings: function(e) {
            return n.sibling((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return n.sibling(e.firstChild)
        },
        contents: function(e) {
            return e.contentDocument || n.merge([], e.childNodes)
        }
    }, function(e, t) {
        n.fn[e] = function(r, i) {
            var s = n.map(this, t, r);
            return "Until" !== e.slice(-5) && (i = r),
            i && "string" == typeof i && (s = n.filter(i, s)),
            this.length > 1 && (C[e] || n.unique(s),
            B.test(e) && s.reverse()),
            this.pushStack(s)
        }
    });
    var E = /\S+/g
      , F = {};
    n.Callbacks = function(e) {
        e = "string" == typeof e ? F[e] || G(e) : n.extend({}, e);
        var t, r, i, s, o, u, a = [], f = !e.once && [], l = function(n) {
            for (t = e.memory && n,
            r = !0,
            u = s || 0,
            s = 0,
            o = a.length,
            i = !0; a && o > u; u++)
                if (a[u].apply(n[0], n[1]) === !1 && e.stopOnFalse) {
                    t = !1;
                    break
                }
            i = !1,
            a && (f ? f.length && l(f.shift()) : t ? a = [] : c.disable())
        }, c = {
            add: function() {
                if (a) {
                    var r = a.length;
                    !function u(t) {
                        n.each(t, function(t, r) {
                            var i = n.type(r);
                            "function" === i ? e.unique && c.has(r) || a.push(r) : r && r.length && "string" !== i && u(r)
                        })
                    }(arguments),
                    i ? o = a.length : t && (s = r,
                    l(t))
                }
                return this
            },
            remove: function() {
                return a && n.each(arguments, function(e, t) {
                    var r;
                    while ((r = n.inArray(t, a, r)) > -1)
                        a.splice(r, 1),
                        i && (o >= r && o--,
                        u >= r && u--)
                }),
                this
            },
            has: function(e) {
                return e ? n.inArray(e, a) > -1 : !!a && !!a.length
            },
            empty: function() {
                return a = [],
                o = 0,
                this
            },
            disable: function() {
                return a = f = t = void 0,
                this
            },
            disabled: function() {
                return !a
            },
            lock: function() {
                return f = void 0,
                t || c.disable(),
                this
            },
            locked: function() {
                return !f
            },
            fireWith: function(e, t) {
                return !a || r && !f || (t = t || [],
                t = [e, t.slice ? t.slice() : t],
                i ? f.push(t) : l(t)),
                this
            },
            fire: function() {
                return c.fireWith(this, arguments),
                this
            },
            fired: function() {
                return !!r
            }
        };
        return c
    }
    ,
    n.extend({
        Deferred: function(e) {
            var t = [["resolve", "done", n.Callbacks("once memory"), "resolved"], ["reject", "fail", n.Callbacks("once memory"), "rejected"], ["notify", "progress", n.Callbacks("memory")]]
              , r = "pending"
              , i = {
                state: function() {
                    return r
                },
                always: function() {
                    return s.done(arguments).fail(arguments),
                    this
                },
                then: function() {
                    var e = arguments;
                    return n.Deferred(function(r) {
                        n.each(t, function(t, o) {
                            var u = n.isFunction(e[t]) && e[t];
                            s[o[1]](function() {
                                var e = u && u.apply(this, arguments);
                                e && n.isFunction(e.promise) ? e.promise().done(r.resolve).fail(r.reject).progress(r.notify) : r[o[0] + "With"](this === i ? r.promise() : this, u ? [e] : arguments)
                            })
                        }),
                        e = null
                    }).promise()
                },
                promise: function(e) {
                    return null != e ? n.extend(e, i) : i
                }
            }
              , s = {};
            return i.pipe = i.then,
            n.each(t, function(e, n) {
                var o = n[2]
                  , u = n[3];
                i[n[1]] = o.add,
                u && o.add(function() {
                    r = u
                }, t[1 ^ e][2].disable, t[2][2].lock),
                s[n[0]] = function() {
                    return s[n[0] + "With"](this === s ? i : this, arguments),
                    this
                }
                ,
                s[n[0] + "With"] = o.fireWith
            }),
            i.promise(s),
            e && e.call(s, s),
            s
        },
        when: function(e) {
            var t = 0, r = d.call(arguments), i = r.length, s = 1 !== i || e && n.isFunction(e.promise) ? i : 0, o = 1 === s ? e : n.Deferred(), u = function(e, t, n) {
                return function(r) {
                    t[e] = this,
                    n[e] = arguments.length > 1 ? d.call(arguments) : r,
                    n === a ? o.notifyWith(t, n) : --s || o.resolveWith(t, n)
                }
            }, a, f, l;
            if (i > 1)
                for (a = new Array(i),
                f = new Array(i),
                l = new Array(i); i > t; t++)
                    r[t] && n.isFunction(r[t].promise) ? r[t].promise().done(u(t, l, r)).fail(o.reject).progress(u(t, f, a)) : --s;
            return s || o.resolveWith(l, r),
            o.promise()
        }
    });
    var H;
    n.fn.ready = function(e) {
        return n.ready.promise().done(e),
        this
    }
    ,
    n.extend({
        isReady: !1,
        readyWait: 1,
        holdReady: function(e) {
            e ? n.readyWait++ : n.ready(!0)
        },
        ready: function(e) {
            (e === !0 ? --n.readyWait : n.isReady) || (n.isReady = !0,
            e !== !0 && --n.readyWait > 0 || (H.resolveWith(l, [n]),
            n.fn.triggerHandler && (n(l).triggerHandler("ready"),
            n(l).off("ready"))))
        }
    }),
    n.ready.promise = function(e) {
        return H || (H = n.Deferred(),
        "complete" === l.readyState ? setTimeout(n.ready) : (l.addEventListener("DOMContentLoaded", I, !1),
        a.addEventListener("load", I, !1))),
        H.promise(e)
    }
    ,
    n.ready.promise();
    var J = n.access = function(e, t, r, i, s, o, u) {
        var a = 0
          , f = e.length
          , l = null == r;
        if ("object" === n.type(r)) {
            s = !0;
            for (a in r)
                n.access(e, t, a, r[a], !0, o, u)
        } else if (void 0 !== i && (s = !0,
        n.isFunction(i) || (u = !0),
        l && (u ? (t.call(e, i),
        t = null) : (l = t,
        t = function(e, t, r) {
            return l.call(n(e), r)
        }
        )),
        t))
            for (; f > a; a++)
                t(e[a], r, u ? i : i.call(e[a], a, t(e[a], r)));
        return s ? e : l ? t.call(e) : f ? t(e[0], r) : o
    }
    ;
    n.acceptData = function(e) {
        return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
    }
    ,
    K.uid = 1,
    K.accepts = n.acceptData,
    K.prototype = {
        key: function(e) {
            if (!K.accepts(e))
                return 0;
            var t = {}
              , r = e[this.expando];
            if (!r) {
                r = K.uid++;
                try {
                    t[this.expando] = {
                        value: r
                    },
                    Object.defineProperties(e, t)
                } catch (i) {
                    t[this.expando] = r,
                    n.extend(e, t)
                }
            }
            return this.cache[r] || (this.cache[r] = {}),
            r
        },
        set: function(e, t, r) {
            var i, s = this.key(e), o = this.cache[s];
            if ("string" == typeof t)
                o[t] = r;
            else if (n.isEmptyObject(o))
                n.extend(this.cache[s], t);
            else
                for (i in t)
                    o[i] = t[i];
            return o
        },
        get: function(e, t) {
            var n = this.cache[this.key(e)];
            return void 0 === t ? n : n[t]
        },
        access: function(e, t, r) {
            var i;
            return void 0 === t || t && "string" == typeof t && void 0 === r ? (i = this.get(e, t),
            void 0 !== i ? i : this.get(e, n.camelCase(t))) : (this.set(e, t, r),
            void 0 !== r ? r : t)
        },
        remove: function(e, t) {
            var r, i, s, o = this.key(e), u = this.cache[o];
            if (void 0 === t)
                this.cache[o] = {};
            else {
                n.isArray(t) ? i = t.concat(t.map(n.camelCase)) : (s = n.camelCase(t),
                t in u ? i = [t, s] : (i = s,
                i = i in u ? [i] : i.match(E) || [])),
                r = i.length;
                while (r--)
                    delete u[i[r]]
            }
        },
        hasData: function(e) {
            return !n.isEmptyObject(this.cache[e[this.expando]] || {})
        },
        discard: function(e) {
            e[this.expando] && delete this.cache[e[this.expando]]
        }
    };
    var L = new K
      , M = new K
      , N = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/
      , O = /([A-Z])/g;
    n.extend({
        hasData: function(e) {
            return M.hasData(e) || L.hasData(e)
        },
        data: function(e, t, n) {
            return M.access(e, t, n)
        },
        removeData: function(e, t) {
            M.remove(e, t)
        },
        _data: function(e, t, n) {
            return L.access(e, t, n)
        },
        _removeData: function(e, t) {
            L.remove(e, t)
        }
    }),
    n.fn.extend({
        data: function(e, t) {
            var r, i, s, o = this[0], u = o && o.attributes;
            if (void 0 === e) {
                if (this.length && (s = M.get(o),
                1 === o.nodeType && !L.get(o, "hasDataAttrs"))) {
                    r = u.length;
                    while (r--)
                        u[r] && (i = u[r].name,
                        0 === i.indexOf("data-") && (i = n.camelCase(i.slice(5)),
                        P(o, i, s[i])));
                    L.set(o, "hasDataAttrs", !0)
                }
                return s
            }
            return "object" == typeof e ? this.each(function() {
                M.set(this, e)
            }) : J(this, function(t) {
                var r, i = n.camelCase(e);
                if (o && void 0 === t) {
                    if (r = M.get(o, e),
                    void 0 !== r)
                        return r;
                    if (r = M.get(o, i),
                    void 0 !== r)
                        return r;
                    if (r = P(o, i, void 0),
                    void 0 !== r)
                        return r
                } else
                    this.each(function() {
                        var n = M.get(this, i);
                        M.set(this, i, t),
                        -1 !== e.indexOf("-") && void 0 !== n && M.set(this, e, t)
                    })
            }, null, t, arguments.length > 1, null, !0)
        },
        removeData: function(e) {
            return this.each(function() {
                M.remove(this, e)
            })
        }
    }),
    n.extend({
        queue: function(e, t, r) {
            var i;
            return e ? (t = (t || "fx") + "queue",
            i = L.get(e, t),
            r && (!i || n.isArray(r) ? i = L.access(e, t, n.makeArray(r)) : i.push(r)),
            i || []) : void 0
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var r = n.queue(e, t)
              , i = r.length
              , s = r.shift()
              , o = n._queueHooks(e, t)
              , u = function() {
                n.dequeue(e, t)
            };
            "inprogress" === s && (s = r.shift(),
            i--),
            s && ("fx" === t && r.unshift("inprogress"),
            delete o.stop,
            s.call(e, u, o)),
            !i && o && o.empty.fire()
        },
        _queueHooks: function(e, t) {
            var r = t + "queueHooks";
            return L.get(e, r) || L.access(e, r, {
                empty: n.Callbacks("once memory").add(function() {
                    L.remove(e, [t + "queue", r])
                })
            })
        }
    }),
    n.fn.extend({
        queue: function(e, t) {
            var r = 2;
            return "string" != typeof e && (t = e,
            e = "fx",
            r--),
            arguments.length < r ? n.queue(this[0], e) : void 0 === t ? this : this.each(function() {
                var r = n.queue(this, e, t);
                n._queueHooks(this, e),
                "fx" === e && "inprogress" !== r[0] && n.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                n.dequeue(this, e)
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, t) {
            var r, i = 1, s = n.Deferred(), o = this, u = this.length, a = function() {
                --i || s.resolveWith(o, [o])
            };
            "string" != typeof e && (t = e,
            e = void 0),
            e = e || "fx";
            while (u--)
                r = L.get(o[u], e + "queueHooks"),
                r && r.empty && (i++,
                r.empty.add(a));
            return a(),
            s.promise(t)
        }
    });
    var Q = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source
      , R = ["Top", "Right", "Bottom", "Left"]
      , S = function(e, t) {
        return e = t || e,
        "none" === n.css(e, "display") || !n.contains(e.ownerDocument, e)
    }
      , T = /^(?:checkbox|radio)$/i;
    !function() {
        var e = l.createDocumentFragment()
          , t = e.appendChild(l.createElement("div"))
          , n = l.createElement("input");
        n.setAttribute("type", "radio"),
        n.setAttribute("checked", "checked"),
        n.setAttribute("name", "t"),
        t.appendChild(n),
        k.checkClone = t.cloneNode(!0).cloneNode(!0).lastChild.checked,
        t.innerHTML = "<textarea>x</textarea>",
        k.noCloneChecked = !!t.cloneNode(!0).lastChild.defaultValue
    }();
    var U = "undefined";
    k.focusinBubbles = "onfocusin"in a;
    var V = /^key/
      , W = /^(?:mouse|pointer|contextmenu)|click/
      , X = /^(?:focusinfocus|focusoutblur)$/
      , Y = /^([^.]*)(?:\.(.+)|)$/;
    n.event = {
        global: {},
        add: function(e, t, r, i, s) {
            var o, u, a, f, l, c, h, p, d, v, m, g = L.get(e);
            if (g) {
                r.handler && (o = r,
                r = o.handler,
                s = o.selector),
                r.guid || (r.guid = n.guid++),
                (f = g.events) || (f = g.events = {}),
                (u = g.handle) || (u = g.handle = function(t) {
                    return typeof n !== U && n.event.triggered !== t.type ? n.event.dispatch.apply(e, arguments) : void 0
                }
                ),
                t = (t || "").match(E) || [""],
                l = t.length;
                while (l--)
                    a = Y.exec(t[l]) || [],
                    d = m = a[1],
                    v = (a[2] || "").split(".").sort(),
                    d && (h = n.event.special[d] || {},
                    d = (s ? h.delegateType : h.bindType) || d,
                    h = n.event.special[d] || {},
                    c = n.extend({
                        type: d,
                        origType: m,
                        data: i,
                        handler: r,
                        guid: r.guid,
                        selector: s,
                        needsContext: s && n.expr.match.needsContext.test(s),
                        namespace: v.join(".")
                    }, o),
                    (p = f[d]) || (p = f[d] = [],
                    p.delegateCount = 0,
                    h.setup && h.setup.call(e, i, v, u) !== !1 || e.addEventListener && e.addEventListener(d, u, !1)),
                    h.add && (h.add.call(e, c),
                    c.handler.guid || (c.handler.guid = r.guid)),
                    s ? p.splice(p.delegateCount++, 0, c) : p.push(c),
                    n.event.global[d] = !0)
            }
        },
        remove: function(e, t, r, i, s) {
            var o, u, a, f, l, c, h, p, d, v, m, g = L.hasData(e) && L.get(e);
            if (g && (f = g.events)) {
                t = (t || "").match(E) || [""],
                l = t.length;
                while (l--)
                    if (a = Y.exec(t[l]) || [],
                    d = m = a[1],
                    v = (a[2] || "").split(".").sort(),
                    d) {
                        h = n.event.special[d] || {},
                        d = (i ? h.delegateType : h.bindType) || d,
                        p = f[d] || [],
                        a = a[2] && new RegExp("(^|\\.)" + v.join("\\.(?:.*\\.|)") + "(\\.|$)"),
                        u = o = p.length;
                        while (o--)
                            c = p[o],
                            !s && m !== c.origType || r && r.guid !== c.guid || a && !a.test(c.namespace) || i && i !== c.selector && ("**" !== i || !c.selector) || (p.splice(o, 1),
                            c.selector && p.delegateCount--,
                            h.remove && h.remove.call(e, c));
                        u && !p.length && (h.teardown && h.teardown.call(e, v, g.handle) !== !1 || n.removeEvent(e, d, g.handle),
                        delete f[d])
                    } else
                        for (d in f)
                            n.event.remove(e, d + t[l], r, i, !0);
                n.isEmptyObject(f) && (delete g.handle,
                L.remove(e, "events"))
            }
        },
        trigger: function(e, t, r, i) {
            var s, o, u, f, c, h, p, d = [r || l], v = j.call(e, "type") ? e.type : e, m = j.call(e, "namespace") ? e.namespace.split(".") : [];
            if (o = u = r = r || l,
            3 !== r.nodeType && 8 !== r.nodeType && !X.test(v + n.event.triggered) && (v.indexOf(".") >= 0 && (m = v.split("."),
            v = m.shift(),
            m.sort()),
            c = v.indexOf(":") < 0 && "on" + v,
            e = e[n.expando] ? e : new n.Event(v,"object" == typeof e && e),
            e.isTrigger = i ? 2 : 3,
            e.namespace = m.join("."),
            e.namespace_re = e.namespace ? new RegExp("(^|\\.)" + m.join("\\.(?:.*\\.|)") + "(\\.|$)") : null,
            e.result = void 0,
            e.target || (e.target = r),
            t = null == t ? [e] : n.makeArray(t, [e]),
            p = n.event.special[v] || {},
            i || !p.trigger || p.trigger.apply(r, t) !== !1)) {
                if (!i && !p.noBubble && !n.isWindow(r)) {
                    for (f = p.delegateType || v,
                    X.test(f + v) || (o = o.parentNode); o; o = o.parentNode)
                        d.push(o),
                        u = o;
                    u === (r.ownerDocument || l) && d.push(u.defaultView || u.parentWindow || a)
                }
                s = 0;
                while ((o = d[s++]) && !e.isPropagationStopped())
                    e.type = s > 1 ? f : p.bindType || v,
                    h = (L.get(o, "events") || {})[e.type] && L.get(o, "handle"),
                    h && h.apply(o, t),
                    h = c && o[c],
                    h && h.apply && n.acceptData(o) && (e.result = h.apply(o, t),
                    e.result === !1 && e.preventDefault());
                return e.type = v,
                i || e.isDefaultPrevented() || p._default && p._default.apply(d.pop(), t) !== !1 || !n.acceptData(r) || c && n.isFunction(r[v]) && !n.isWindow(r) && (u = r[c],
                u && (r[c] = null),
                n.event.triggered = v,
                r[v](),
                n.event.triggered = void 0,
                u && (r[c] = u)),
                e.result
            }
        },
        dispatch: function(e) {
            e = n.event.fix(e);
            var t, r, i, s, o, u = [], a = d.call(arguments), f = (L.get(this, "events") || {})[e.type] || [], l = n.event.special[e.type] || {};
            if (a[0] = e,
            e.delegateTarget = this,
            !l.preDispatch || l.preDispatch.call(this, e) !== !1) {
                u = n.event.handlers.call(this, e, f),
                t = 0;
                while ((s = u[t++]) && !e.isPropagationStopped()) {
                    e.currentTarget = s.elem,
                    r = 0;
                    while ((o = s.handlers[r++]) && !e.isImmediatePropagationStopped())
                        (!e.namespace_re || e.namespace_re.test(o.namespace)) && (e.handleObj = o,
                        e.data = o.data,
                        i = ((n.event.special[o.origType] || {}).handle || o.handler).apply(s.elem, a),
                        void 0 !== i && (e.result = i) === !1 && (e.preventDefault(),
                        e.stopPropagation()))
                }
                return l.postDispatch && l.postDispatch.call(this, e),
                e.result
            }
        },
        handlers: function(e, t) {
            var r, i, s, o, u = [], a = t.delegateCount, f = e.target;
            if (a && f.nodeType && (!e.button || "click" !== e.type))
                for (; f !== this; f = f.parentNode || this)
                    if (f.disabled !== !0 || "click" !== e.type) {
                        for (i = [],
                        r = 0; a > r; r++)
                            o = t[r],
                            s = o.selector + " ",
                            void 0 === i[s] && (i[s] = o.needsContext ? n(s, this).index(f) >= 0 : n.find(s, this, null, [f]).length),
                            i[s] && i.push(o);
                        i.length && u.push({
                            elem: f,
                            handlers: i
                        })
                    }
            return a < t.length && u.push({
                elem: this,
                handlers: t.slice(a)
            }),
            u
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function(e, t) {
                return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode),
                e
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(e, t) {
                var n, r, i, s = t.button;
                return null == e.pageX && null != t.clientX && (n = e.target.ownerDocument || l,
                r = n.documentElement,
                i = n.body,
                e.pageX = t.clientX + (r && r.scrollLeft || i && i.scrollLeft || 0) - (r && r.clientLeft || i && i.clientLeft || 0),
                e.pageY = t.clientY + (r && r.scrollTop || i && i.scrollTop || 0) - (r && r.clientTop || i && i.clientTop || 0)),
                e.which || void 0 === s || (e.which = 1 & s ? 1 : 2 & s ? 3 : 4 & s ? 2 : 0),
                e
            }
        },
        fix: function(e) {
            if (e[n.expando])
                return e;
            var t, r, i, s = e.type, o = e, u = this.fixHooks[s];
            u || (this.fixHooks[s] = u = W.test(s) ? this.mouseHooks : V.test(s) ? this.keyHooks : {}),
            i = u.props ? this.props.concat(u.props) : this.props,
            e = new n.Event(o),
            t = i.length;
            while (t--)
                r = i[t],
                e[r] = o[r];
            return e.target || (e.target = l),
            3 === e.target.nodeType && (e.target = e.target.parentNode),
            u.filter ? u.filter(e, o) : e
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    return this !== _() && this.focus ? (this.focus(),
                    !1) : void 0
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    return this === _() && this.blur ? (this.blur(),
                    !1) : void 0
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    return "checkbox" === this.type && this.click && n.nodeName(this, "input") ? (this.click(),
                    !1) : void 0
                },
                _default: function(e) {
                    return n.nodeName(e.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                }
            }
        },
        simulate: function(e, t, r, i) {
            var s = n.extend(new n.Event, r, {
                type: e,
                isSimulated: !0,
                originalEvent: {}
            });
            i ? n.event.trigger(s, null, t) : n.event.dispatch.call(t, s),
            s.isDefaultPrevented() && r.preventDefault()
        }
    },
    n.removeEvent = function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n, !1)
    }
    ,
    n.Event = function(e, t) {
        return this instanceof n.Event ? (e && e.type ? (this.originalEvent = e,
        this.type = e.type,
        this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && e.returnValue === !1 ? Z : $) : this.type = e,
        t && n.extend(this, t),
        this.timeStamp = e && e.timeStamp || n.now(),
        void (this[n.expando] = !0)) : new n.Event(e,t)
    }
    ,
    n.Event.prototype = {
        isDefaultPrevented: $,
        isPropagationStopped: $,
        isImmediatePropagationStopped: $,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = Z,
            e && e.preventDefault && e.preventDefault()
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = Z,
            e && e.stopPropagation && e.stopPropagation()
        },
        stopImmediatePropagation: function() {
            var e = this.originalEvent;
            this.isImmediatePropagationStopped = Z,
            e && e.stopImmediatePropagation && e.stopImmediatePropagation(),
            this.stopPropagation()
        }
    },
    n.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function(e, t) {
        n.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function(e) {
                var r, i = this, s = e.relatedTarget, o = e.handleObj;
                return (!s || s !== i && !n.contains(i, s)) && (e.type = o.origType,
                r = o.handler.apply(this, arguments),
                e.type = t),
                r
            }
        }
    }),
    k.focusinBubbles || n.each({
        focus: "focusin",
        blur: "focusout"
    }, function(e, t) {
        var r = function(e) {
            n.event.simulate(t, e.target, n.event.fix(e), !0)
        };
        n.event.special[t] = {
            setup: function() {
                var n = this.ownerDocument || this
                  , i = L.access(n, t);
                i || n.addEventListener(e, r, !0),
                L.access(n, t, (i || 0) + 1)
            },
            teardown: function() {
                var n = this.ownerDocument || this
                  , i = L.access(n, t) - 1;
                i ? L.access(n, t, i) : (n.removeEventListener(e, r, !0),
                L.remove(n, t))
            }
        }
    }),
    n.fn.extend({
        on: function(e, t, r, i, s) {
            var o, u;
            if ("object" == typeof e) {
                "string" != typeof t && (r = r || t,
                t = void 0);
                for (u in e)
                    this.on(u, t, r, e[u], s);
                return this
            }
            if (null == r && null == i ? (i = t,
            r = t = void 0) : null == i && ("string" == typeof t ? (i = r,
            r = void 0) : (i = r,
            r = t,
            t = void 0)),
            i === !1)
                i = $;
            else if (!i)
                return this;
            return 1 === s && (o = i,
            i = function(e) {
                return n().off(e),
                o.apply(this, arguments)
            }
            ,
            i.guid = o.guid || (o.guid = n.guid++)),
            this.each(function() {
                n.event.add(this, e, i, r, t)
            })
        },
        one: function(e, t, n, r) {
            return this.on(e, t, n, r, 1)
        },
        off: function(e, t, r) {
            var i, s;
            if (e && e.preventDefault && e.handleObj)
                return i = e.handleObj,
                n(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler),
                this;
            if ("object" == typeof e) {
                for (s in e)
                    this.off(s, t, e[s]);
                return this
            }
            return (t === !1 || "function" == typeof t) && (r = t,
            t = void 0),
            r === !1 && (r = $),
            this.each(function() {
                n.event.remove(this, e, r, t)
            })
        },
        trigger: function(e, t) {
            return this.each(function() {
                n.event.trigger(e, t, this)
            })
        },
        triggerHandler: function(e, t) {
            var r = this[0];
            return r ? n.event.trigger(e, t, r, !0) : void 0
        }
    });
    var aa = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi
      , ba = /<([\w:]+)/
      , ca = /<|&#?\w+;/
      , da = /<(?:script|style|link)/i
      , ea = /checked\s*(?:[^=]|=\s*.checked.)/i
      , fa = /^$|\/(?:java|ecma)script/i
      , ga = /^true\/(.*)/
      , ha = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g
      , ia = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        thead: [1, "<table>", "</table>"],
        col: [2, "<table><colgroup>", "</colgroup></table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: [0, "", ""]
    };
    ia.optgroup = ia.option,
    ia.tbody = ia.tfoot = ia.colgroup = ia.caption = ia.thead,
    ia.th = ia.td,
    n.extend({
        clone: function(e, t, r) {
            var i, s, o, u, a = e.cloneNode(!0), f = n.contains(e.ownerDocument, e);
            if (!(k.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || n.isXMLDoc(e)))
                for (u = oa(a),
                o = oa(e),
                i = 0,
                s = o.length; s > i; i++)
                    pa(o[i], u[i]);
            if (t)
                if (r)
                    for (o = o || oa(e),
                    u = u || oa(a),
                    i = 0,
                    s = o.length; s > i; i++)
                        na(o[i], u[i]);
                else
                    na(e, a);
            return u = oa(a, "script"),
            u.length > 0 && ma(u, !f && oa(e, "script")),
            a
        },
        buildFragment: function(e, t, r, i) {
            for (var s, o, u, a, f, l, c = t.createDocumentFragment(), h = [], p = 0, d = e.length; d > p; p++)
                if (s = e[p],
                s || 0 === s)
                    if ("object" === n.type(s))
                        n.merge(h, s.nodeType ? [s] : s);
                    else if (ca.test(s)) {
                        o = o || c.appendChild(t.createElement("div")),
                        u = (ba.exec(s) || ["", ""])[1].toLowerCase(),
                        a = ia[u] || ia._default,
                        o.innerHTML = a[1] + s.replace(aa, "<$1></$2>") + a[2],
                        l = a[0];
                        while (l--)
                            o = o.lastChild;
                        n.merge(h, o.childNodes),
                        o = c.firstChild,
                        o.textContent = ""
                    } else
                        h.push(t.createTextNode(s));
            c.textContent = "",
            p = 0;
            while (s = h[p++])
                if ((!i || -1 === n.inArray(s, i)) && (f = n.contains(s.ownerDocument, s),
                o = oa(c.appendChild(s), "script"),
                f && ma(o),
                r)) {
                    l = 0;
                    while (s = o[l++])
                        fa.test(s.type || "") && r.push(s)
                }
            return c
        },
        cleanData: function(e) {
            for (var t, r, i, s, o = n.event.special, u = 0; void 0 !== (r = e[u]); u++) {
                if (n.acceptData(r) && (s = r[L.expando],
                s && (t = L.cache[s]))) {
                    if (t.events)
                        for (i in t.events)
                            o[i] ? n.event.remove(r, i) : n.removeEvent(r, i, t.handle);
                    L.cache[s] && delete L.cache[s]
                }
                delete M.cache[r[M.expando]]
            }
        }
    }),
    n.fn.extend({
        text: function(e) {
            return J(this, function(e) {
                return void 0 === e ? n.text(this) : this.empty().each(function() {
                    (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) && (this.textContent = e)
                })
            }, null, e, arguments.length)
        },
        append: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = ja(this, e);
                    t.appendChild(e)
                }
            })
        },
        prepend: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = ja(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            })
        },
        before: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        },
        after: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        },
        remove: function(e, t) {
            for (var r, i = e ? n.filter(e, this) : this, s = 0; null != (r = i[s]); s++)
                t || 1 !== r.nodeType || n.cleanData(oa(r)),
                r.parentNode && (t && n.contains(r.ownerDocument, r) && ma(oa(r, "script")),
                r.parentNode.removeChild(r));
            return this
        },
        empty: function() {
            for (var e, t = 0; null != (e = this[t]); t++)
                1 === e.nodeType && (n.cleanData(oa(e, !1)),
                e.textContent = "");
            return this
        },
        clone: function(e, t) {
            return e = null == e ? !1 : e,
            t = null == t ? e : t,
            this.map(function() {
                return n.clone(this, e, t)
            })
        },
        html: function(e) {
            return J(this, function(e) {
                var t = this[0] || {}
                  , r = 0
                  , i = this.length;
                if (void 0 === e && 1 === t.nodeType)
                    return t.innerHTML;
                if ("string" == typeof e && !da.test(e) && !ia[(ba.exec(e) || ["", ""])[1].toLowerCase()]) {
                    e = e.replace(aa, "<$1></$2>");
                    try {
                        for (; i > r; r++)
                            t = this[r] || {},
                            1 === t.nodeType && (n.cleanData(oa(t, !1)),
                            t.innerHTML = e);
                        t = 0
                    } catch (s) {}
                }
                t && this.empty().append(e)
            }, null, e, arguments.length)
        },
        replaceWith: function() {
            var e = arguments[0];
            return this.domManip(arguments, function(t) {
                e = this.parentNode,
                n.cleanData(oa(this)),
                e && e.replaceChild(t, this)
            }),
            e && (e.length || e.nodeType) ? this : this.remove()
        },
        detach: function(e) {
            return this.remove(e, !0)
        },
        domManip: function(t, r) {
            t = e.apply([], t);
            var i, s, o, u, a, f, l = 0, c = this.length, h = this, p = c - 1, d = t[0], v = n.isFunction(d);
            if (v || c > 1 && "string" == typeof d && !k.checkClone && ea.test(d))
                return this.each(function(e) {
                    var n = h.eq(e);
                    v && (t[0] = d.call(this, e, n.html())),
                    n.domManip(t, r)
                });
            if (c && (i = n.buildFragment(t, this[0].ownerDocument, !1, this),
            s = i.firstChild,
            1 === i.childNodes.length && (i = s),
            s)) {
                for (o = n.map(oa(i, "script"), ka),
                u = o.length; c > l; l++)
                    a = i,
                    l !== p && (a = n.clone(a, !0, !0),
                    u && n.merge(o, oa(a, "script"))),
                    r.call(this[l], a, l);
                if (u)
                    for (f = o[o.length - 1].ownerDocument,
                    n.map(o, la),
                    l = 0; u > l; l++)
                        a = o[l],
                        fa.test(a.type || "") && !L.access(a, "globalEval") && n.contains(f, a) && (a.src ? n._evalUrl && n._evalUrl(a.src) : n.globalEval(a.textContent.replace(ha, "")))
            }
            return this
        }
    }),
    n.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, t) {
        n.fn[e] = function(e) {
            for (var r, i = [], s = n(e), o = s.length - 1, u = 0; o >= u; u++)
                r = u === o ? this : this.clone(!0),
                n(s[u])[t](r),
                f.apply(i, r.get());
            return this.pushStack(i)
        }
    });
    var qa, ra = {}, ua = /^margin/, va = new RegExp("^(" + Q + ")(?!px)[a-z%]+$","i"), wa = function(e) {
        return e.ownerDocument.defaultView.opener ? e.ownerDocument.defaultView.getComputedStyle(e, null) : a.getComputedStyle(e, null)
    };
    !function() {
        var e, t, r = l.documentElement, i = l.createElement("div"), s = l.createElement("div");
        if (s.style) {
            s.style.backgroundClip = "content-box",
            s.cloneNode(!0).style.backgroundClip = "",
            k.clearCloneStyle = "content-box" === s.style.backgroundClip,
            i.style.cssText = "border:0;width:0;height:0;top:0;left:-9999px;margin-top:1px;position:absolute",
            i.appendChild(s);
            function o() {
                s.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute",
                s.innerHTML = "",
                r.appendChild(i);
                var n = a.getComputedStyle(s, null);
                e = "1%" !== n.top,
                t = "4px" === n.width,
                r.removeChild(i)
            }
            a.getComputedStyle && n.extend(k, {
                pixelPosition: function() {
                    return o(),
                    e
                },
                boxSizingReliable: function() {
                    return null == t && o(),
                    t
                },
                reliableMarginRight: function() {
                    var e, t = s.appendChild(l.createElement("div"));
                    return t.style.cssText = s.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0",
                    t.style.marginRight = t.style.width = "0",
                    s.style.width = "1px",
                    r.appendChild(i),
                    e = !parseFloat(a.getComputedStyle(t, null).marginRight),
                    r.removeChild(i),
                    s.removeChild(t),
                    e
                }
            })
        }
    }(),
    n.swap = function(e, t, n, r) {
        var i, s, o = {};
        for (s in t)
            o[s] = e.style[s],
            e.style[s] = t[s];
        i = n.apply(e, r || []);
        for (s in t)
            e.style[s] = o[s];
        return i
    }
    ;
    var za = /^(none|table(?!-c[ea]).+)/
      , Aa = new RegExp("^(" + Q + ")(.*)$","i")
      , Ba = new RegExp("^([+-])=(" + Q + ")","i")
      , Ca = {
        position: "absolute",
        visibility: "hidden",
        display: "block"
    }
      , Da = {
        letterSpacing: "0",
        fontWeight: "400"
    }
      , Ea = ["Webkit", "O", "Moz", "ms"];
    n.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = xa(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": "cssFloat"
        },
        style: function(e, t, r, i) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var s, o, u, a = n.camelCase(t), f = e.style;
                return t = n.cssProps[a] || (n.cssProps[a] = Fa(f, a)),
                u = n.cssHooks[t] || n.cssHooks[a],
                void 0 === r ? u && "get"in u && void 0 !== (s = u.get(e, !1, i)) ? s : f[t] : (o = typeof r,
                "string" === o && (s = Ba.exec(r)) && (r = (s[1] + 1) * s[2] + parseFloat(n.css(e, t)),
                o = "number"),
                null != r && r === r && ("number" !== o || n.cssNumber[a] || (r += "px"),
                k.clearCloneStyle || "" !== r || 0 !== t.indexOf("background") || (f[t] = "inherit"),
                u && "set"in u && void 0 === (r = u.set(e, r, i)) || (f[t] = r)),
                void 0)
            }
        },
        css: function(e, t, r, i) {
            var s, o, u, a = n.camelCase(t);
            return t = n.cssProps[a] || (n.cssProps[a] = Fa(e.style, a)),
            u = n.cssHooks[t] || n.cssHooks[a],
            u && "get"in u && (s = u.get(e, !0, r)),
            void 0 === s && (s = xa(e, t, i)),
            "normal" === s && t in Da && (s = Da[t]),
            "" === r || r ? (o = parseFloat(s),
            r === !0 || n.isNumeric(o) ? o || 0 : s) : s
        }
    }),
    n.each(["height", "width"], function(e, t) {
        n.cssHooks[t] = {
            get: function(e, r, i) {
                return r ? za.test(n.css(e, "display")) && 0 === e.offsetWidth ? n.swap(e, Ca, function() {
                    return Ia(e, t, i)
                }) : Ia(e, t, i) : void 0
            },
            set: function(e, r, i) {
                var s = i && wa(e);
                return Ga(e, r, i ? Ha(e, t, i, "border-box" === n.css(e, "boxSizing", !1, s), s) : 0)
            }
        }
    }),
    n.cssHooks.marginRight = ya(k.reliableMarginRight, function(e, t) {
        return t ? n.swap(e, {
            display: "inline-block"
        }, xa, [e, "marginRight"]) : void 0
    }),
    n.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        n.cssHooks[e + t] = {
            expand: function(n) {
                for (var r = 0, i = {}, s = "string" == typeof n ? n.split(" ") : [n]; 4 > r; r++)
                    i[e + R[r] + t] = s[r] || s[r - 2] || s[0];
                return i
            }
        },
        ua.test(e) || (n.cssHooks[e + t].set = Ga)
    }),
    n.fn.extend({
        css: function(e, t) {
            return J(this, function(e, t, r) {
                var i, s, o = {}, u = 0;
                if (n.isArray(t)) {
                    for (i = wa(e),
                    s = t.length; s > u; u++)
                        o[t[u]] = n.css(e, t[u], !1, i);
                    return o
                }
                return void 0 !== r ? n.style(e, t, r) : n.css(e, t)
            }, e, t, arguments.length > 1)
        },
        show: function() {
            return Ja(this, !0)
        },
        hide: function() {
            return Ja(this)
        },
        toggle: function(e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                S(this) ? n(this).show() : n(this).hide()
            })
        }
    }),
    n.Tween = Ka,
    Ka.prototype = {
        constructor: Ka,
        init: function(e, t, r, i, s, o) {
            this.elem = e,
            this.prop = r,
            this.easing = s || "swing",
            this.options = t,
            this.start = this.now = this.cur(),
            this.end = i,
            this.unit = o || (n.cssNumber[r] ? "" : "px")
        },
        cur: function() {
            var e = Ka.propHooks[this.prop];
            return e && e.get ? e.get(this) : Ka.propHooks._default.get(this)
        },
        run: function(e) {
            var t, r = Ka.propHooks[this.prop];
            return this.options.duration ? this.pos = t = n.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e,
            this.now = (this.end - this.start) * t + this.start,
            this.options.step && this.options.step.call(this.elem, this.now, this),
            r && r.set ? r.set(this) : Ka.propHooks._default.set(this),
            this
        }
    },
    Ka.prototype.init.prototype = Ka.prototype,
    Ka.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = n.css(e.elem, e.prop, ""),
                t && "auto" !== t ? t : 0) : e.elem[e.prop]
            },
            set: function(e) {
                n.fx.step[e.prop] ? n.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[n.cssProps[e.prop]] || n.cssHooks[e.prop]) ? n.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
            }
        }
    },
    Ka.propHooks.scrollTop = Ka.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    },
    n.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return .5 - Math.cos(e * Math.PI) / 2
        }
    },
    n.fx = Ka.prototype.init,
    n.fx.step = {};
    var La, Ma, Na = /^(?:toggle|show|hide)$/, Oa = new RegExp("^(?:([+-])=|)(" + Q + ")([a-z%]*)$","i"), Pa = /queueHooks$/, Qa = [Va], Ra = {
        "*": [function(e, t) {
            var r = this.createTween(e, t)
              , i = r.cur()
              , s = Oa.exec(t)
              , o = s && s[3] || (n.cssNumber[e] ? "" : "px")
              , u = (n.cssNumber[e] || "px" !== o && +i) && Oa.exec(n.css(r.elem, e))
              , a = 1
              , f = 20;
            if (u && u[3] !== o) {
                o = o || u[3],
                s = s || [],
                u = +i || 1;
                do
                    a = a || ".5",
                    u /= a,
                    n.style(r.elem, e, u + o);
                while (a !== (a = r.cur() / i) && 1 !== a && --f)
            }
            return s && (u = r.start = +u || +i || 0,
            r.unit = o,
            r.end = s[1] ? u + (s[1] + 1) * s[2] : +s[2]),
            r
        }
        ]
    };
    n.Animation = n.extend(Xa, {
        tweener: function(e, t) {
            n.isFunction(e) ? (t = e,
            e = ["*"]) : e = e.split(" ");
            for (var r, i = 0, s = e.length; s > i; i++)
                r = e[i],
                Ra[r] = Ra[r] || [],
                Ra[r].unshift(t)
        },
        prefilter: function(e, t) {
            t ? Qa.unshift(e) : Qa.push(e)
        }
    }),
    n.speed = function(e, t, r) {
        var i = e && "object" == typeof e ? n.extend({}, e) : {
            complete: r || !r && t || n.isFunction(e) && e,
            duration: e,
            easing: r && t || t && !n.isFunction(t) && t
        };
        return i.duration = n.fx.off ? 0 : "number" == typeof i.duration ? i.duration : i.duration in n.fx.speeds ? n.fx.speeds[i.duration] : n.fx.speeds._default,
        (null == i.queue || i.queue === !0) && (i.queue = "fx"),
        i.old = i.complete,
        i.complete = function() {
            n.isFunction(i.old) && i.old.call(this),
            i.queue && n.dequeue(this, i.queue)
        }
        ,
        i
    }
    ,
    n.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(S).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r)
        },
        animate: function(e, t, r, i) {
            var s = n.isEmptyObject(e)
              , o = n.speed(t, r, i)
              , u = function() {
                var t = Xa(this, n.extend({}, e), o);
                (s || L.get(this, "finish")) && t.stop(!0)
            };
            return u.finish = u,
            s || o.queue === !1 ? this.each(u) : this.queue(o.queue, u)
        },
        stop: function(e, t, r) {
            var i = function(e) {
                var t = e.stop;
                delete e.stop,
                t(r)
            };
            return "string" != typeof e && (r = t,
            t = e,
            e = void 0),
            t && e !== !1 && this.queue(e || "fx", []),
            this.each(function() {
                var t = !0
                  , s = null != e && e + "queueHooks"
                  , o = n.timers
                  , u = L.get(this);
                if (s)
                    u[s] && u[s].stop && i(u[s]);
                else
                    for (s in u)
                        u[s] && u[s].stop && Pa.test(s) && i(u[s]);
                for (s = o.length; s--; )
                    o[s].elem !== this || null != e && o[s].queue !== e || (o[s].anim.stop(r),
                    t = !1,
                    o.splice(s, 1));
                (t || !r) && n.dequeue(this, e)
            })
        },
        finish: function(e) {
            return e !== !1 && (e = e || "fx"),
            this.each(function() {
                var t, r = L.get(this), i = r[e + "queue"], s = r[e + "queueHooks"], o = n.timers, u = i ? i.length : 0;
                for (r.finish = !0,
                n.queue(this, e, []),
                s && s.stop && s.stop.call(this, !0),
                t = o.length; t--; )
                    o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0),
                    o.splice(t, 1));
                for (t = 0; u > t; t++)
                    i[t] && i[t].finish && i[t].finish.call(this);
                delete r.finish
            })
        }
    }),
    n.each(["toggle", "show", "hide"], function(e, t) {
        var r = n.fn[t];
        n.fn[t] = function(e, n, i) {
            return null == e || "boolean" == typeof e ? r.apply(this, arguments) : this.animate(Ta(t, !0), e, n, i)
        }
    }),
    n.each({
        slideDown: Ta("show"),
        slideUp: Ta("hide"),
        slideToggle: Ta("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        n.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r)
        }
    }),
    n.timers = [],
    n.fx.tick = function() {
        var e, t = 0, r = n.timers;
        for (La = n.now(); t < r.length; t++)
            e = r[t],
            e() || r[t] !== e || r.splice(t--, 1);
        r.length || n.fx.stop(),
        La = void 0
    }
    ,
    n.fx.timer = function(e) {
        n.timers.push(e),
        e() ? n.fx.start() : n.timers.pop()
    }
    ,
    n.fx.interval = 13,
    n.fx.start = function() {
        Ma || (Ma = setInterval(n.fx.tick, n.fx.interval))
    }
    ,
    n.fx.stop = function() {
        clearInterval(Ma),
        Ma = null
    }
    ,
    n.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    },
    n.fn.delay = function(e, t) {
        return e = n.fx ? n.fx.speeds[e] || e : e,
        t = t || "fx",
        this.queue(t, function(t, n) {
            var r = setTimeout(t, e);
            n.stop = function() {
                clearTimeout(r)
            }
        })
    }
    ,
    function() {
        var e = l.createElement("input")
          , t = l.createElement("select")
          , n = t.appendChild(l.createElement("option"));
        e.type = "checkbox",
        k.checkOn = "" !== e.value,
        k.optSelected = n.selected,
        t.disabled = !0,
        k.optDisabled = !n.disabled,
        e = l.createElement("input"),
        e.value = "t",
        e.type = "radio",
        k.radioValue = "t" === e.value
    }();
    var Ya, Za, $a = n.expr.attrHandle;
    n.fn.extend({
        attr: function(e, t) {
            return J(this, n.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                n.removeAttr(this, e)
            })
        }
    }),
    n.extend({
        attr: function(e, t, r) {
            var i, s, o = e.nodeType;
            if (e && 3 !== o && 8 !== o && 2 !== o)
                return typeof e.getAttribute === U ? n.prop(e, t, r) : (1 === o && n.isXMLDoc(e) || (t = t.toLowerCase(),
                i = n.attrHooks[t] || (n.expr.match.bool.test(t) ? Za : Ya)),
                void 0 === r ? i && "get"in i && null !== (s = i.get(e, t)) ? s : (s = n.find.attr(e, t),
                null == s ? void 0 : s) : null !== r ? i && "set"in i && void 0 !== (s = i.set(e, r, t)) ? s : (e.setAttribute(t, r + ""),
                r) : void n.removeAttr(e, t))
        },
        removeAttr: function(e, t) {
            var r, i, s = 0, o = t && t.match(E);
            if (o && 1 === e.nodeType)
                while (r = o[s++])
                    i = n.propFix[r] || r,
                    n.expr.match.bool.test(r) && (e[i] = !1),
                    e.removeAttribute(r)
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!k.radioValue && "radio" === t && n.nodeName(e, "input")) {
                        var r = e.value;
                        return e.setAttribute("type", t),
                        r && (e.value = r),
                        t
                    }
                }
            }
        }
    }),
    Za = {
        set: function(e, t, r) {
            return t === !1 ? n.removeAttr(e, r) : e.setAttribute(r, r),
            r
        }
    },
    n.each(n.expr.match.bool.source.match(/\w+/g), function(e, t) {
        var r = $a[t] || n.find.attr;
        $a[t] = function(e, t, n) {
            var i, s;
            return n || (s = $a[t],
            $a[t] = i,
            i = null != r(e, t, n) ? t.toLowerCase() : null,
            $a[t] = s),
            i
        }
    });
    var _a = /^(?:input|select|textarea|button)$/i;
    n.fn.extend({
        prop: function(e, t) {
            return J(this, n.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return this.each(function() {
                delete this[n.propFix[e] || e]
            })
        }
    }),
    n.extend({
        propFix: {
            "for": "htmlFor",
            "class": "className"
        },
        prop: function(e, t, r) {
            var i, s, o, u = e.nodeType;
            if (e && 3 !== u && 8 !== u && 2 !== u)
                return o = 1 !== u || !n.isXMLDoc(e),
                o && (t = n.propFix[t] || t,
                s = n.propHooks[t]),
                void 0 !== r ? s && "set"in s && void 0 !== (i = s.set(e, r, t)) ? i : e[t] = r : s && "get"in s && null !== (i = s.get(e, t)) ? i : e[t]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    return e.hasAttribute("tabindex") || _a.test(e.nodeName) || e.href ? e.tabIndex : -1
                }
            }
        }
    }),
    k.optSelected || (n.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && t.parentNode && t.parentNode.selectedIndex,
            null
        }
    }),
    n.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        n.propFix[this.toLowerCase()] = this
    });
    var ab = /[\t\r\n\f]/g;
    n.fn.extend({
        addClass: function(e) {
            var t, r, i, s, o, u, a = "string" == typeof e && e, f = 0, l = this.length;
            if (n.isFunction(e))
                return this.each(function(t) {
                    n(this).addClass(e.call(this, t, this.className))
                });
            if (a)
                for (t = (e || "").match(E) || []; l > f; f++)
                    if (r = this[f],
                    i = 1 === r.nodeType && (r.className ? (" " + r.className + " ").replace(ab, " ") : " ")) {
                        o = 0;
                        while (s = t[o++])
                            i.indexOf(" " + s + " ") < 0 && (i += s + " ");
                        u = n.trim(i),
                        r.className !== u && (r.className = u)
                    }
            return this
        },
        removeClass: function(e) {
            var t, r, i, s, o, u, a = 0 === arguments.length || "string" == typeof e && e, f = 0, l = this.length;
            if (n.isFunction(e))
                return this.each(function(t) {
                    n(this).removeClass(e.call(this, t, this.className))
                });
            if (a)
                for (t = (e || "").match(E) || []; l > f; f++)
                    if (r = this[f],
                    i = 1 === r.nodeType && (r.className ? (" " + r.className + " ").replace(ab, " ") : "")) {
                        o = 0;
                        while (s = t[o++])
                            while (i.indexOf(" " + s + " ") >= 0)
                                i = i.replace(" " + s + " ", " ");
                        u = e ? n.trim(i) : "",
                        r.className !== u && (r.className = u)
                    }
            return this
        },
        toggleClass: function(e, t) {
            var r = typeof e;
            return "boolean" == typeof t && "string" === r ? t ? this.addClass(e) : this.removeClass(e) : this.each(n.isFunction(e) ? function(r) {
                n(this).toggleClass(e.call(this, r, this.className, t), t)
            }
            : function() {
                if ("string" === r) {
                    var t, i = 0, s = n(this), o = e.match(E) || [];
                    while (t = o[i++])
                        s.hasClass(t) ? s.removeClass(t) : s.addClass(t)
                } else
                    (r === U || "boolean" === r) && (this.className && L.set(this, "__className__", this.className),
                    this.className = this.className || e === !1 ? "" : L.get(this, "__className__") || "")
            }
            )
        },
        hasClass: function(e) {
            for (var t = " " + e + " ", n = 0, r = this.length; r > n; n++)
                if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(ab, " ").indexOf(t) >= 0)
                    return !0;
            return !1
        }
    });
    var bb = /\r/g;
    n.fn.extend({
        val: function(e) {
            var t, r, i, s = this[0];
            if (arguments.length)
                return i = n.isFunction(e),
                this.each(function(r) {
                    var s;
                    1 === this.nodeType && (s = i ? e.call(this, r, n(this).val()) : e,
                    null == s ? s = "" : "number" == typeof s ? s += "" : n.isArray(s) && (s = n.map(s, function(e) {
                        return null == e ? "" : e + ""
                    })),
                    t = n.valHooks[this.type] || n.valHooks[this.nodeName.toLowerCase()],
                    t && "set"in t && void 0 !== t.set(this, s, "value") || (this.value = s))
                });
            if (s)
                return t = n.valHooks[s.type] || n.valHooks[s.nodeName.toLowerCase()],
                t && "get"in t && void 0 !== (r = t.get(s, "value")) ? r : (r = s.value,
                "string" == typeof r ? r.replace(bb, "") : null == r ? "" : r)
        }
    }),
    n.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = n.find.attr(e, "value");
                    return null != t ? t : n.trim(n.text(e))
                }
            },
            select: {
                get: function(e) {
                    for (var t, r, i = e.options, s = e.selectedIndex, o = "select-one" === e.type || 0 > s, u = o ? null : [], a = o ? s + 1 : i.length, f = 0 > s ? a : o ? s : 0; a > f; f++)
                        if (r = i[f],
                        !(!r.selected && f !== s || (k.optDisabled ? r.disabled : null !== r.getAttribute("disabled")) || r.parentNode.disabled && n.nodeName(r.parentNode, "optgroup"))) {
                            if (t = n(r).val(),
                            o)
                                return t;
                            u.push(t)
                        }
                    return u
                },
                set: function(e, t) {
                    var r, i, s = e.options, o = n.makeArray(t), u = s.length;
                    while (u--)
                        i = s[u],
                        (i.selected = n.inArray(i.value, o) >= 0) && (r = !0);
                    return r || (e.selectedIndex = -1),
                    o
                }
            }
        }
    }),
    n.each(["radio", "checkbox"], function() {
        n.valHooks[this] = {
            set: function(e, t) {
                return n.isArray(t) ? e.checked = n.inArray(n(e).val(), t) >= 0 : void 0
            }
        },
        k.checkOn || (n.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value
        }
        )
    }),
    n.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
        n.fn[t] = function(e, n) {
            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
        }
    }),
    n.fn.extend({
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        },
        bind: function(e, t, n) {
            return this.on(e, null, t, n)
        },
        unbind: function(e, t) {
            return this.off(e, null, t)
        },
        delegate: function(e, t, n, r) {
            return this.on(t, e, n, r)
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        }
    });
    var cb = n.now()
      , db = /\?/;
    n.parseJSON = function(e) {
        return JSON.parse(e + "")
    }
    ,
    n.parseXML = function(e) {
        var t, r;
        if (!e || "string" != typeof e)
            return null;
        try {
            r = new DOMParser,
            t = r.parseFromString(e, "text/xml")
        } catch (i) {
            t = void 0
        }
        return (!t || t.getElementsByTagName("parsererror").length) && n.error("Invalid XML: " + e),
        t
    }
    ;
    var eb = /#.*$/
      , fb = /([?&])_=[^&]*/
      , gb = /^(.*?):[ \t]*([^\r\n]*)$/gm
      , hb = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/
      , ib = /^(?:GET|HEAD)$/
      , jb = /^\/\//
      , kb = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/
      , lb = {}
      , mb = {}
      , nb = "*/".concat("*")
      , ob = a.location.href
      , pb = kb.exec(ob.toLowerCase()) || [];
    n.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: ob,
            type: "GET",
            isLocal: hb.test(pb[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": nb,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": n.parseJSON,
                "text xml": n.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? sb(sb(e, n.ajaxSettings), t) : sb(n.ajaxSettings, e)
        },
        ajaxPrefilter: qb(lb),
        ajaxTransport: qb(mb),
        ajax: function(e, t) {
            function T(e, t, o, a) {
                var l, g, y, w, E, x = t;
                2 !== b && (b = 2,
                u && clearTimeout(u),
                r = void 0,
                s = a || "",
                S.readyState = e > 0 ? 4 : 0,
                l = e >= 200 && 300 > e || 304 === e,
                o && (w = tb(c, S, o)),
                w = ub(c, w, S, l),
                l ? (c.ifModified && (E = S.getResponseHeader("Last-Modified"),
                E && (n.lastModified[i] = E),
                E = S.getResponseHeader("etag"),
                E && (n.etag[i] = E)),
                204 === e || "HEAD" === c.type ? x = "nocontent" : 304 === e ? x = "notmodified" : (x = w.state,
                g = w.data,
                y = w.error,
                l = !y)) : (y = x,
                (e || !x) && (x = "error",
                0 > e && (e = 0))),
                S.status = e,
                S.statusText = (t || x) + "",
                l ? d.resolveWith(h, [g, x, S]) : d.rejectWith(h, [S, x, y]),
                S.statusCode(m),
                m = void 0,
                f && p.trigger(l ? "ajaxSuccess" : "ajaxError", [S, c, l ? g : y]),
                v.fireWith(h, [S, x]),
                f && (p.trigger("ajaxComplete", [S, c]),
                --n.active || n.event.trigger("ajaxStop")))
            }
            "object" == typeof e && (t = e,
            e = void 0),
            t = t || {};
            var r, i, s, o, u, a, f, l, c = n.ajaxSetup({}, t), h = c.context || c, p = c.context && (h.nodeType || h.jquery) ? n(h) : n.event, d = n.Deferred(), v = n.Callbacks("once memory"), m = c.statusCode || {}, g = {}, y = {}, b = 0, w = "canceled", S = {
                readyState: 0,
                getResponseHeader: function(e) {
                    var t;
                    if (2 === b) {
                        if (!o) {
                            o = {};
                            while (t = gb.exec(s))
                                o[t[1].toLowerCase()] = t[2]
                        }
                        t = o[e.toLowerCase()]
                    }
                    return null == t ? null : t
                },
                getAllResponseHeaders: function() {
                    return 2 === b ? s : null
                },
                setRequestHeader: function(e, t) {
                    var n = e.toLowerCase();
                    return b || (e = y[n] = y[n] || e,
                    g[e] = t),
                    this
                },
                overrideMimeType: function(e) {
                    return b || (c.mimeType = e),
                    this
                },
                statusCode: function(e) {
                    var t;
                    if (e)
                        if (2 > b)
                            for (t in e)
                                m[t] = [m[t], e[t]];
                        else
                            S.always(e[S.status]);
                    return this
                },
                abort: function(e) {
                    var t = e || w;
                    return r && r.abort(t),
                    T(0, t),
                    this
                }
            };
            if (d.promise(S).complete = v.add,
            S.success = S.done,
            S.error = S.fail,
            c.url = ((e || c.url || ob) + "").replace(eb, "").replace(jb, pb[1] + "//"),
            c.type = t.method || t.type || c.method || c.type,
            c.dataTypes = n.trim(c.dataType || "*").toLowerCase().match(E) || [""],
            null == c.crossDomain && (a = kb.exec(c.url.toLowerCase()),
            c.crossDomain = !(!a || a[1] === pb[1] && a[2] === pb[2] && (a[3] || ("http:" === a[1] ? "80" : "443")) === (pb[3] || ("http:" === pb[1] ? "80" : "443")))),
            c.data && c.processData && "string" != typeof c.data && (c.data = n.param(c.data, c.traditional)),
            rb(lb, c, t, S),
            2 === b)
                return S;
            f = n.event && c.global,
            f && 0 === n.active++ && n.event.trigger("ajaxStart"),
            c.type = c.type.toUpperCase(),
            c.hasContent = !ib.test(c.type),
            i = c.url,
            c.hasContent || (c.data && (i = c.url += (db.test(i) ? "&" : "?") + c.data,
            delete c.data),
            c.cache === !1 && (c.url = fb.test(i) ? i.replace(fb, "$1_=" + cb++) : i + (db.test(i) ? "&" : "?") + "_=" + cb++)),
            c.ifModified && (n.lastModified[i] && S.setRequestHeader("If-Modified-Since", n.lastModified[i]),
            n.etag[i] && S.setRequestHeader("If-None-Match", n.etag[i])),
            (c.data && c.hasContent && c.contentType !== !1 || t.contentType) && S.setRequestHeader("Content-Type", c.contentType),
            S.setRequestHeader("Accept", c.dataTypes[0] && c.accepts[c.dataTypes[0]] ? c.accepts[c.dataTypes[0]] + ("*" !== c.dataTypes[0] ? ", " + nb + "; q=0.01" : "") : c.accepts["*"]);
            for (l in c.headers)
                S.setRequestHeader(l, c.headers[l]);
            if (!c.beforeSend || c.beforeSend.call(h, S, c) !== !1 && 2 !== b) {
                w = "abort";
                for (l in {
                    success: 1,
                    error: 1,
                    complete: 1
                })
                    S[l](c[l]);
                if (r = rb(mb, c, t, S)) {
                    S.readyState = 1,
                    f && p.trigger("ajaxSend", [S, c]),
                    c.async && c.timeout > 0 && (u = setTimeout(function() {
                        S.abort("timeout")
                    }, c.timeout));
                    try {
                        b = 1,
                        r.send(g, T)
                    } catch (x) {
                        if (!(2 > b))
                            throw x;
                        T(-1, x)
                    }
                } else
                    T(-1, "No Transport");
                return S
            }
            return S.abort()
        },
        getJSON: function(e, t, r) {
            return n.get(e, t, r, "json")
        },
        getScript: function(e, t) {
            return n.get(e, void 0, t, "script")
        }
    }),
    n.each(["get", "post"], function(e, t) {
        n[t] = function(e, r, i, s) {
            return n.isFunction(r) && (s = s || i,
            i = r,
            r = void 0),
            n.ajax({
                url: e,
                type: t,
                dataType: s,
                data: r,
                success: i
            })
        }
    }),
    n._evalUrl = function(e) {
        return n.ajax({
            url: e,
            type: "GET",
            dataType: "script",
            async: !1,
            global: !1,
            "throws": !0
        })
    }
    ,
    n.fn.extend({
        wrapAll: function(e) {
            var t;
            return n.isFunction(e) ? this.each(function(t) {
                n(this).wrapAll(e.call(this, t))
            }) : (this[0] && (t = n(e, this[0].ownerDocument).eq(0).clone(!0),
            this[0].parentNode && t.insertBefore(this[0]),
            t.map(function() {
                var e = this;
                while (e.firstElementChild)
                    e = e.firstElementChild;
                return e
            }).append(this)),
            this)
        },
        wrapInner: function(e) {
            return this.each(n.isFunction(e) ? function(t) {
                n(this).wrapInner(e.call(this, t))
            }
            : function() {
                var t = n(this)
                  , r = t.contents();
                r.length ? r.wrapAll(e) : t.append(e)
            }
            )
        },
        wrap: function(e) {
            var t = n.isFunction(e);
            return this.each(function(r) {
                n(this).wrapAll(t ? e.call(this, r) : e)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                n.nodeName(this, "body") || n(this).replaceWith(this.childNodes)
            }).end()
        }
    }),
    n.expr.filters.hidden = function(e) {
        return e.offsetWidth <= 0 && e.offsetHeight <= 0
    }
    ,
    n.expr.filters.visible = function(e) {
        return !n.expr.filters.hidden(e)
    }
    ;
    var vb = /%20/g
      , wb = /\[\]$/
      , xb = /\r?\n/g
      , yb = /^(?:submit|button|image|reset|file)$/i
      , zb = /^(?:input|select|textarea|keygen)/i;
    n.param = function(e, t) {
        var r, i = [], s = function(e, t) {
            t = n.isFunction(t) ? t() : null == t ? "" : t,
            i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
        };
        if (void 0 === t && (t = n.ajaxSettings && n.ajaxSettings.traditional),
        n.isArray(e) || e.jquery && !n.isPlainObject(e))
            n.each(e, function() {
                s(this.name, this.value)
            });
        else
            for (r in e)
                Ab(r, e[r], t, s);
        return i.join("&").replace(vb, "+")
    }
    ,
    n.fn.extend({
        serialize: function() {
            return n.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var e = n.prop(this, "elements");
                return e ? n.makeArray(e) : this
            }).filter(function() {
                var e = this.type;
                return this.name && !n(this).is(":disabled") && zb.test(this.nodeName) && !yb.test(e) && (this.checked || !T.test(e))
            }).map(function(e, t) {
                var r = n(this).val();
                return null == r ? null : n.isArray(r) ? n.map(r, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(xb, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: r.replace(xb, "\r\n")
                }
            }).get()
        }
    }),
    n.ajaxSettings.xhr = function() {
        try {
            return new XMLHttpRequest
        } catch (e) {}
    }
    ;
    var Bb = 0
      , Cb = {}
      , Db = {
        0: 200,
        1223: 204
    }
      , Eb = n.ajaxSettings.xhr();
    a.attachEvent && a.attachEvent("onunload", function() {
        for (var e in Cb)
            Cb[e]()
    }),
    k.cors = !!Eb && "withCredentials"in Eb,
    k.ajax = Eb = !!Eb,
    n.ajaxTransport(function(e) {
        var t;
        return k.cors || Eb && !e.crossDomain ? {
            send: function(n, r) {
                var i, s = e.xhr(), o = ++Bb;
                if (s.open(e.type, e.url, e.async, e.username, e.password),
                e.xhrFields)
                    for (i in e.xhrFields)
                        s[i] = e.xhrFields[i];
                e.mimeType && s.overrideMimeType && s.overrideMimeType(e.mimeType),
                e.crossDomain || n["X-Requested-With"] || (n["X-Requested-With"] = "XMLHttpRequest");
                for (i in n)
                    s.setRequestHeader(i, n[i]);
                t = function(e) {
                    return function() {
                        t && (delete Cb[o],
                        t = s.onload = s.onerror = null,
                        "abort" === e ? s.abort() : "error" === e ? r(s.status, s.statusText) : r(Db[s.status] || s.status, s.statusText, "string" == typeof s.responseText ? {
                            text: s.responseText
                        } : void 0, s.getAllResponseHeaders()))
                    }
                }
                ,
                s.onload = t(),
                s.onerror = t("error"),
                t = Cb[o] = t("abort");
                try {
                    s.send(e.hasContent && e.data || null)
                } catch (u) {
                    if (t)
                        throw u
                }
            },
            abort: function() {
                t && t()
            }
        } : void 0
    }),
    n.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /(?:java|ecma)script/
        },
        converters: {
            "text script": function(e) {
                return n.globalEval(e),
                e
            }
        }
    }),
    n.ajaxPrefilter("script", function(e) {
        void 0 === e.cache && (e.cache = !1),
        e.crossDomain && (e.type = "GET")
    }),
    n.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var t, r;
            return {
                send: function(i, s) {
                    t = n("<script>").prop({
                        async: !0,
                        charset: e.scriptCharset,
                        src: e.url
                    }).on("load error", r = function(e) {
                        t.remove(),
                        r = null,
                        e && s("error" === e.type ? 404 : 200, e.type)
                    }
                    ),
                    l.head.appendChild(t[0])
                },
                abort: function() {
                    r && r()
                }
            }
        }
    });
    var Fb = []
      , Gb = /(=)\?(?=&|$)|\?\?/;
    n.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Fb.pop() || n.expando + "_" + cb++;
            return this[e] = !0,
            e
        }
    }),
    n.ajaxPrefilter("json jsonp", function(e, t, r) {
        var i, s, o, u = e.jsonp !== !1 && (Gb.test(e.url) ? "url" : "string" == typeof e.data && !(e.contentType || "").indexOf("application/x-www-form-urlencoded") && Gb.test(e.data) && "data");
        return u || "jsonp" === e.dataTypes[0] ? (i = e.jsonpCallback = n.isFunction(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback,
        u ? e[u] = e[u].replace(Gb, "$1" + i) : e.jsonp !== !1 && (e.url += (db.test(e.url) ? "&" : "?") + e.jsonp + "=" + i),
        e.converters["script json"] = function() {
            return o || n.error(i + " was not called"),
            o[0]
        }
        ,
        e.dataTypes[0] = "json",
        s = a[i],
        a[i] = function() {
            o = arguments
        }
        ,
        r.always(function() {
            a[i] = s,
            e[i] && (e.jsonpCallback = t.jsonpCallback,
            Fb.push(i)),
            o && n.isFunction(s) && s(o[0]),
            o = s = void 0
        }),
        "script") : void 0
    }),
    n.parseHTML = function(e, t, r) {
        if (!e || "string" != typeof e)
            return null;
        "boolean" == typeof t && (r = t,
        t = !1),
        t = t || l;
        var i = v.exec(e)
          , s = !r && [];
        return i ? [t.createElement(i[1])] : (i = n.buildFragment([e], t, s),
        s && s.length && n(s).remove(),
        n.merge([], i.childNodes))
    }
    ;
    var Hb = n.fn.load;
    n.fn.load = function(e, t, r) {
        if ("string" != typeof e && Hb)
            return Hb.apply(this, arguments);
        var i, s, o, u = this, a = e.indexOf(" ");
        return a >= 0 && (i = n.trim(e.slice(a)),
        e = e.slice(0, a)),
        n.isFunction(t) ? (r = t,
        t = void 0) : t && "object" == typeof t && (s = "POST"),
        u.length > 0 && n.ajax({
            url: e,
            type: s,
            dataType: "html",
            data: t
        }).done(function(e) {
            o = arguments,
            u.html(i ? n("<div>").append(n.parseHTML(e)).find(i) : e)
        }).complete(r && function(e, t) {
            u.each(r, o || [e.responseText, t, e])
        }
        ),
        this
    }
    ,
    n.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        n.fn[t] = function(e) {
            return this.on(t, e)
        }
    }),
    n.expr.filters.animated = function(e) {
        return n.grep(n.timers, function(t) {
            return e === t.elem
        }).length
    }
    ;
    var Ib = a.document.documentElement;
    n.offset = {
        setOffset: function(e, t, r) {
            var i, s, o, u, a, f, l, c = n.css(e, "position"), h = n(e), p = {};
            "static" === c && (e.style.position = "relative"),
            a = h.offset(),
            o = n.css(e, "top"),
            f = n.css(e, "left"),
            l = ("absolute" === c || "fixed" === c) && (o + f).indexOf("auto") > -1,
            l ? (i = h.position(),
            u = i.top,
            s = i.left) : (u = parseFloat(o) || 0,
            s = parseFloat(f) || 0),
            n.isFunction(t) && (t = t.call(e, r, a)),
            null != t.top && (p.top = t.top - a.top + u),
            null != t.left && (p.left = t.left - a.left + s),
            "using"in t ? t.using.call(e, p) : h.css(p)
        }
    },
    n.fn.extend({
        offset: function(e) {
            if (arguments.length)
                return void 0 === e ? this : this.each(function(t) {
                    n.offset.setOffset(this, e, t)
                });
            var t, r, i = this[0], s = {
                top: 0,
                left: 0
            }, o = i && i.ownerDocument;
            if (o)
                return t = o.documentElement,
                n.contains(t, i) ? (typeof i.getBoundingClientRect !== U && (s = i.getBoundingClientRect()),
                r = Jb(o),
                {
                    top: s.top + r.pageYOffset - t.clientTop,
                    left: s.left + r.pageXOffset - t.clientLeft
                }) : s
        },
        position: function() {
            if (this[0]) {
                var e, t, r = this[0], i = {
                    top: 0,
                    left: 0
                };
                return "fixed" === n.css(r, "position") ? t = r.getBoundingClientRect() : (e = this.offsetParent(),
                t = this.offset(),
                n.nodeName(e[0], "html") || (i = e.offset()),
                i.top += n.css(e[0], "borderTopWidth", !0),
                i.left += n.css(e[0], "borderLeftWidth", !0)),
                {
                    top: t.top - i.top - n.css(r, "marginTop", !0),
                    left: t.left - i.left - n.css(r, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                var e = this.offsetParent || Ib;
                while (e && !n.nodeName(e, "html") && "static" === n.css(e, "position"))
                    e = e.offsetParent;
                return e || Ib
            })
        }
    }),
    n.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(e, t) {
        var r = "pageYOffset" === t;
        n.fn[e] = function(n) {
            return J(this, function(e, n, i) {
                var s = Jb(e);
                return void 0 === i ? s ? s[t] : e[n] : void (s ? s.scrollTo(r ? a.pageXOffset : i, r ? i : a.pageYOffset) : e[n] = i)
            }, e, n, arguments.length, null)
        }
    }),
    n.each(["top", "left"], function(e, t) {
        n.cssHooks[t] = ya(k.pixelPosition, function(e, r) {
            return r ? (r = xa(e, t),
            va.test(r) ? n(e).position()[t] + "px" : r) : void 0
        })
    }),
    n.each({
        Height: "height",
        Width: "width"
    }, function(e, t) {
        n.each({
            padding: "inner" + e,
            content: t,
            "": "outer" + e
        }, function(r, i) {
            n.fn[i] = function(i, s) {
                var o = arguments.length && (r || "boolean" != typeof i)
                  , u = r || (i === !0 || s === !0 ? "margin" : "border");
                return J(this, function(t, r, i) {
                    var s;
                    return n.isWindow(t) ? t.document.documentElement["client" + e] : 9 === t.nodeType ? (s = t.documentElement,
                    Math.max(t.body["scroll" + e], s["scroll" + e], t.body["offset" + e], s["offset" + e], s["client" + e])) : void 0 === i ? n.css(t, r, u) : n.style(t, r, i, u)
                }, t, o ? i : void 0, o, null)
            }
        })
    }),
    n.fn.size = function() {
        return this.length
    }
    ,
    n.fn.andSelf = n.fn.addBack,
    "function" == typeof define && define.amd && define("jquery", [], function() {
        return n
    });
    var Kb = a.jQuery
      , Lb = a.$;
    return n.noConflict = function(e) {
        return a.$ === n && (a.$ = Lb),
        e && a.jQuery === n && (a.jQuery = Kb),
        n
    }
    ,
    typeof b === U && (a.jQuery = a.$ = n),
    n
});
(function(e) {
    typeof define == "function" && define.amd ? define(["jquery"], e) : typeof exports == "object" ? e(require("jquery")) : e(jQuery)
}
)(function(e) {
    function n(e) {
        return u.raw ? e : encodeURIComponent(e)
    }
    function r(e) {
        return u.raw ? e : decodeURIComponent(e)
    }
    function i(e) {
        return n(u.json ? JSON.stringify(e) : String(e))
    }
    function s(e) {
        e.indexOf('"') === 0 && (e = e.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\"));
        try {
            return e = decodeURIComponent(e.replace(t, " ")),
            u.json ? JSON.parse(e) : e
        } catch (n) {}
    }
    function o(t, n) {
        var r = u.raw ? t : s(t);
        return e.isFunction(n) ? n(r) : r
    }
    var t = /\+/g
      , u = e.cookie = function(t, s, a) {
        if (s !== undefined && !e.isFunction(s)) {
            a = e.extend({}, u.defaults, a);
            if (typeof a.expires == "number") {
                var f = a.expires
                  , l = a.expires = new Date;
                l.setTime(+l + f * 864e5)
            }
            return document.cookie = [n(t), "=", i(s), a.expires ? "; expires=" + a.expires.toUTCString() : "", a.path ? "; path=" + a.path : "", a.domain ? "; domain=" + a.domain : "", a.secure ? "; secure" : ""].join("")
        }
        var c = t ? undefined : {}
          , h = document.cookie ? document.cookie.split("; ") : [];
        for (var p = 0, d = h.length; p < d; p++) {
            var v = h[p].split("=")
              , m = r(v.shift())
              , g = v.join("=");
            if (t && t === m) {
                c = o(g, s);
                break
            }
            !t && (g = o(g)) !== undefined && (c[m] = g)
        }
        return c
    }
    ;
    u.defaults = {},
    e.removeCookie = function(t, n) {
        return e.cookie(t) === undefined ? !1 : (e.cookie(t, "", e.extend({}, n, {
            expires: -1
        })),
        !e.cookie(t))
    }
});
(function(e, t, n, r) {
    var i = e(t);
    e.fn.lazyload = function(s) {
        function f() {
            var t = 0;
            o.each(function() {
                var n = e(this);
                if (a.skip_invisible && !n.is(":visible"))
                    return;
                if (!e.abovethetop(this, a) && !e.leftofbegin(this, a))
                    if (!e.belowthefold(this, a) && !e.rightoffold(this, a))
                        n.trigger("appear"),
                        t = 0;
                    else if (++t > a.failure_limit)
                        return !1
            })
        }
        var o = this, u, a = {
            threshold: 0,
            failure_limit: 0,
            event: "scroll",
            effect: "show",
            container: t,
            data_attribute: "original",
            skip_invisible: !0,
            appear: null,
            load: null,
            placeholder: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
        };
        return s && (r !== s.failurelimit && (s.failure_limit = s.failurelimit,
        delete s.failurelimit),
        r !== s.effectspeed && (s.effect_speed = s.effectspeed,
        delete s.effectspeed),
        e.extend(a, s)),
        u = a.container === r || a.container === t ? i : e(a.container),
        0 === a.event.indexOf("scroll") && u.bind(a.event, function() {
            return f()
        }),
        this.each(function() {
            var t = this
              , n = e(t);
            t.loaded = !1,
            (n.attr("src") === r || n.attr("src") === !1) && n.is("img") && n.attr("src", a.placeholder),
            n.one("appear", function() {
                if (!this.loaded) {
                    if (a.appear) {
                        var r = o.length;
                        a.appear.call(t, r, a)
                    }
                    e("<img />").bind("load", function() {
                        var r = n.attr("data-" + a.data_attribute);
                        n.hide(),
                        n.is("img") ? n.attr("src", r) : n.css("background-image", "url('" + r + "')"),
                        n[a.effect](a.effect_speed),
                        t.loaded = !0;
                        var i = e.grep(o, function(e) {
                            return !e.loaded
                        });
                        o = e(i);
                        if (a.load) {
                            var s = o.length;
                            a.load.call(t, s, a)
                        }
                    }).attr("src", n.attr("data-" + a.data_attribute))
                }
            }),
            0 !== a.event.indexOf("scroll") && n.bind(a.event, function() {
                t.loaded || n.trigger("appear")
            })
        }),
        i.bind("resize", function() {
            f()
        }),
        /(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion) && i.bind("pageshow", function(t) {
            t.originalEvent && t.originalEvent.persisted && o.each(function() {
                e(this).trigger("appear")
            })
        }),
        e(n).ready(function() {
            f()
        }),
        this
    }
    ,
    e.belowthefold = function(n, s) {
        var o;
        return s.container === r || s.container === t ? o = (t.innerHeight ? t.innerHeight : i.height()) + i.scrollTop() : o = e(s.container).offset().top + e(s.container).height(),
        o <= e(n).offset().top - s.threshold
    }
    ,
    e.rightoffold = function(n, s) {
        var o;
        return s.container === r || s.container === t ? o = i.width() + i.scrollLeft() : o = e(s.container).offset().left + e(s.container).width(),
        o <= e(n).offset().left - s.threshold
    }
    ,
    e.abovethetop = function(n, s) {
        var o;
        return s.container === r || s.container === t ? o = i.scrollTop() : o = e(s.container).offset().top,
        o >= e(n).offset().top + s.threshold + e(n).height()
    }
    ,
    e.leftofbegin = function(n, s) {
        var o;
        return s.container === r || s.container === t ? o = i.scrollLeft() : o = e(s.container).offset().left,
        o >= e(n).offset().left + s.threshold + e(n).width()
    }
    ,
    e.inviewport = function(t, n) {
        return !e.rightoffold(t, n) && !e.leftofbegin(t, n) && !e.belowthefold(t, n) && !e.abovethetop(t, n)
    }
    ,
    e.extend(e.expr[":"], {
        "below-the-fold": function(t) {
            return e.belowthefold(t, {
                threshold: 0
            })
        },
        "above-the-top": function(t) {
            return !e.belowthefold(t, {
                threshold: 0
            })
        },
        "right-of-screen": function(t) {
            return e.rightoffold(t, {
                threshold: 0
            })
        },
        "left-of-screen": function(t) {
            return !e.rightoffold(t, {
                threshold: 0
            })
        },
        "in-viewport": function(t) {
            return e.inviewport(t, {
                threshold: 0
            })
        },
        "above-the-fold": function(t) {
            return !e.belowthefold(t, {
                threshold: 0
            })
        },
        "right-of-fold": function(t) {
            return e.rightoffold(t, {
                threshold: 0
            })
        },
        "left-of-fold": function(t) {
            return !e.rightoffold(t, {
                threshold: 0
            })
        }
    })
}
)(jQuery, window, document);
jQuery.easing.jswing = jQuery.easing.swing,
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function(e, t, n, r, i) {
        return jQuery.easing[jQuery.easing.def](e, t, n, r, i)
    },
    easeInQuad: function(e, t, n, r, i) {
        return r * (t /= i) * t + n
    },
    easeOutQuad: function(e, t, n, r, i) {
        return -r * (t /= i) * (t - 2) + n
    },
    easeInOutQuad: function(e, t, n, r, i) {
        return (t /= i / 2) < 1 ? r / 2 * t * t + n : -r / 2 * (--t * (t - 2) - 1) + n
    },
    easeInCubic: function(e, t, n, r, i) {
        return r * (t /= i) * t * t + n
    },
    easeOutCubic: function(e, t, n, r, i) {
        return r * ((t = t / i - 1) * t * t + 1) + n
    },
    easeInOutCubic: function(e, t, n, r, i) {
        return (t /= i / 2) < 1 ? r / 2 * t * t * t + n : r / 2 * ((t -= 2) * t * t + 2) + n
    },
    easeInQuart: function(e, t, n, r, i) {
        return r * (t /= i) * t * t * t + n
    },
    easeOutQuart: function(e, t, n, r, i) {
        return -r * ((t = t / i - 1) * t * t * t - 1) + n
    },
    easeInOutQuart: function(e, t, n, r, i) {
        return (t /= i / 2) < 1 ? r / 2 * t * t * t * t + n : -r / 2 * ((t -= 2) * t * t * t - 2) + n
    },
    easeInQuint: function(e, t, n, r, i) {
        return r * (t /= i) * t * t * t * t + n
    },
    easeOutQuint: function(e, t, n, r, i) {
        return r * ((t = t / i - 1) * t * t * t * t + 1) + n
    },
    easeInOutQuint: function(e, t, n, r, i) {
        return (t /= i / 2) < 1 ? r / 2 * t * t * t * t * t + n : r / 2 * ((t -= 2) * t * t * t * t + 2) + n
    },
    easeInSine: function(e, t, n, r, i) {
        return -r * Math.cos(t / i * (Math.PI / 2)) + r + n
    },
    easeOutSine: function(e, t, n, r, i) {
        return r * Math.sin(t / i * (Math.PI / 2)) + n
    },
    easeInOutSine: function(e, t, n, r, i) {
        return -r / 2 * (Math.cos(Math.PI * t / i) - 1) + n
    },
    easeInExpo: function(e, t, n, r, i) {
        return t == 0 ? n : r * Math.pow(2, 10 * (t / i - 1)) + n
    },
    easeOutExpo: function(e, t, n, r, i) {
        return t == i ? n + r : r * (-Math.pow(2, -10 * t / i) + 1) + n
    },
    easeInOutExpo: function(e, t, n, r, i) {
        return t == 0 ? n : t == i ? n + r : (t /= i / 2) < 1 ? r / 2 * Math.pow(2, 10 * (t - 1)) + n : r / 2 * (-Math.pow(2, -10 * --t) + 2) + n
    },
    easeInCirc: function(e, t, n, r, i) {
        return -r * (Math.sqrt(1 - (t /= i) * t) - 1) + n
    },
    easeOutCirc: function(e, t, n, r, i) {
        return r * Math.sqrt(1 - (t = t / i - 1) * t) + n
    },
    easeInOutCirc: function(e, t, n, r, i) {
        return (t /= i / 2) < 1 ? -r / 2 * (Math.sqrt(1 - t * t) - 1) + n : r / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + n
    },
    easeInElastic: function(e, t, n, r, i) {
        var s = 1.70158
          , o = 0
          , u = r;
        if (t == 0)
            return n;
        if ((t /= i) == 1)
            return n + r;
        o || (o = i * .3);
        if (u < Math.abs(r)) {
            u = r;
            var s = o / 4
        } else
            var s = o / (2 * Math.PI) * Math.asin(r / u);
        return -(u * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * i - s) * 2 * Math.PI / o)) + n
    },
    easeOutElastic: function(e, t, n, r, i) {
        var s = 1.70158
          , o = 0
          , u = r;
        if (t == 0)
            return n;
        if ((t /= i) == 1)
            return n + r;
        o || (o = i * .3);
        if (u < Math.abs(r)) {
            u = r;
            var s = o / 4
        } else
            var s = o / (2 * Math.PI) * Math.asin(r / u);
        return u * Math.pow(2, -10 * t) * Math.sin((t * i - s) * 2 * Math.PI / o) + r + n
    },
    easeInOutElastic: function(e, t, n, r, i) {
        var s = 1.70158
          , o = 0
          , u = r;
        if (t == 0)
            return n;
        if ((t /= i / 2) == 2)
            return n + r;
        o || (o = i * .3 * 1.5);
        if (u < Math.abs(r)) {
            u = r;
            var s = o / 4
        } else
            var s = o / (2 * Math.PI) * Math.asin(r / u);
        return t < 1 ? -0.5 * u * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * i - s) * 2 * Math.PI / o) + n : u * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * i - s) * 2 * Math.PI / o) * .5 + r + n
    },
    easeInBack: function(e, t, n, r, i, s) {
        return s == undefined && (s = 1.70158),
        r * (t /= i) * t * ((s + 1) * t - s) + n
    },
    easeOutBack: function(e, t, n, r, i, s) {
        return s == undefined && (s = 1.70158),
        r * ((t = t / i - 1) * t * ((s + 1) * t + s) + 1) + n
    },
    easeInOutBack: function(e, t, n, r, i, s) {
        return s == undefined && (s = 1.70158),
        (t /= i / 2) < 1 ? r / 2 * t * t * (((s *= 1.525) + 1) * t - s) + n : r / 2 * ((t -= 2) * t * (((s *= 1.525) + 1) * t + s) + 2) + n
    },
    easeInBounce: function(e, t, n, r, i) {
        return r - jQuery.easing.easeOutBounce(e, i - t, 0, r, i) + n
    },
    easeOutBounce: function(e, t, n, r, i) {
        return (t /= i) < 1 / 2.75 ? r * 7.5625 * t * t + n : t < 2 / 2.75 ? r * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + n : t < 2.5 / 2.75 ? r * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + n : r * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + n
    },
    easeInOutBounce: function(e, t, n, r, i) {
        return t < i / 2 ? jQuery.easing.easeInBounce(e, t * 2, 0, r, i) * .5 + n : jQuery.easing.easeOutBounce(e, t * 2 - i, 0, r, i) * .5 + r * .5 + n
    }
});
(function(e, t, n, r) {
    "use strict";
    function l(e, t, n) {
        return setTimeout(y(e, n), t)
    }
    function c(e, t, n) {
        return Array.isArray(e) ? (h(e, n[t], n),
        !0) : !1
    }
    function h(e, t, n) {
        var i;
        if (!e)
            return;
        if (e.forEach)
            e.forEach(t, n);
        else if (e.length !== r) {
            i = 0;
            while (i < e.length)
                t.call(n, e[i], i, e),
                i++
        } else
            for (i in e)
                e.hasOwnProperty(i) && t.call(n, e[i], i, e)
    }
    function p(t, n, r) {
        var i = "DEPRECATED METHOD: " + n + "\n" + r + " AT \n";
        return function() {
            var n = new Error("get-stack-trace")
              , r = n && n.stack ? n.stack.replace(/^[^\(]+?[\n$]/gm, "").replace(/^\s+at\s+/gm, "").replace(/^Object.<anonymous>\s*\(/gm, "{anonymous}()@") : "Unknown Stack Trace"
              , s = e.console && (e.console.warn || e.console.log);
            return s && s.call(e.console, i, r),
            t.apply(this, arguments)
        }
    }
    function g(e, t, n) {
        var r = t.prototype, i;
        i = e.prototype = Object.create(r),
        i.constructor = e,
        i._super = r,
        n && d(i, n)
    }
    function y(e, t) {
        return function() {
            return e.apply(t, arguments)
        }
    }
    function b(e, t) {
        return typeof e == o ? e.apply(t ? t[0] || r : r, t) : e
    }
    function w(e, t) {
        return e === r ? t : e
    }
    function E(e, t, n) {
        h(N(t), function(t) {
            e.addEventListener(t, n, !1)
        })
    }
    function S(e, t, n) {
        h(N(t), function(t) {
            e.removeEventListener(t, n, !1)
        })
    }
    function x(e, t) {
        while (e) {
            if (e == t)
                return !0;
            e = e.parentNode
        }
        return !1
    }
    function T(e, t) {
        return e.indexOf(t) > -1
    }
    function N(e) {
        return e.trim().split(/\s+/g)
    }
    function C(e, t, n) {
        if (e.indexOf && !n)
            return e.indexOf(t);
        var r = 0;
        while (r < e.length) {
            if (n && e[r][n] == t || !n && e[r] === t)
                return r;
            r++
        }
        return -1
    }
    function k(e) {
        return Array.prototype.slice.call(e, 0)
    }
    function L(e, t, n) {
        var r = []
          , i = []
          , s = 0;
        while (s < e.length) {
            var o = t ? e[s][t] : e[s];
            C(i, o) < 0 && r.push(e[s]),
            i[s] = o,
            s++
        }
        return n && (t ? r = r.sort(function(n, r) {
            return n[t] > r[t]
        }) : r = r.sort()),
        r
    }
    function A(e, t) {
        var n, s, o = t[0].toUpperCase() + t.slice(1), u = 0;
        while (u < i.length) {
            n = i[u],
            s = n ? n + o : t;
            if (s in e)
                return s;
            u++
        }
        return r
    }
    function M() {
        return O++
    }
    function _(t) {
        var n = t.ownerDocument || t;
        return n.defaultView || n.parentWindow || e
    }
    function nt(e, t) {
        var n = this;
        this.manager = e,
        this.callback = t,
        this.element = e.element,
        this.target = e.options.inputTarget,
        this.domHandler = function(t) {
            b(e.options.enable, [e]) && n.handler(t)
        }
        ,
        this.init()
    }
    function rt(e) {
        var t, n = e.options.inputClass;
        return n ? t = n : H ? t = Tt : B ? t = _t : P ? t = Bt : t = bt,
        new t(e,it)
    }
    function it(e, t, n) {
        var r = n.pointers.length
          , i = n.changedPointers.length
          , s = t & U && r - i === 0
          , o = t & (W | X) && r - i === 0;
        n.isFirst = !!s,
        n.isFinal = !!o,
        s && (e.session = {}),
        n.eventType = t,
        st(e, n),
        e.emit("hammer.input", n),
        e.recognize(n),
        e.session.prevInput = n
    }
    function st(e, t) {
        var n = e.session
          , r = t.pointers
          , i = r.length;
        n.firstInput || (n.firstInput = at(t)),
        i > 1 && !n.firstMultiple ? n.firstMultiple = at(t) : i === 1 && (n.firstMultiple = !1);
        var s = n.firstInput
          , o = n.firstMultiple
          , u = o ? o.center : s.center
          , l = t.center = ft(r);
        t.timeStamp = f(),
        t.deltaTime = t.timeStamp - s.timeStamp,
        t.angle = pt(u, l),
        t.distance = ht(u, l),
        ot(n, t),
        t.offsetDirection = ct(t.deltaX, t.deltaY);
        var c = lt(t.deltaTime, t.deltaX, t.deltaY);
        t.overallVelocityX = c.x,
        t.overallVelocityY = c.y,
        t.overallVelocity = a(c.x) > a(c.y) ? c.x : c.y,
        t.scale = o ? vt(o.pointers, r) : 1,
        t.rotation = o ? dt(o.pointers, r) : 0,
        t.maxPointers = n.prevInput ? t.pointers.length > n.prevInput.maxPointers ? t.pointers.length : n.prevInput.maxPointers : t.pointers.length,
        ut(n, t);
        var h = e.element;
        x(t.srcEvent.target, h) && (h = t.srcEvent.target),
        t.target = h
    }
    function ot(e, t) {
        var n = t.center
          , r = e.offsetDelta || {}
          , i = e.prevDelta || {}
          , s = e.prevInput || {};
        if (t.eventType === U || s.eventType === W)
            i = e.prevDelta = {
                x: s.deltaX || 0,
                y: s.deltaY || 0
            },
            r = e.offsetDelta = {
                x: n.x,
                y: n.y
            };
        t.deltaX = i.x + (n.x - r.x),
        t.deltaY = i.y + (n.y - r.y)
    }
    function ut(e, t) {
        var n = e.lastInterval || t, i = t.timeStamp - n.timeStamp, s, o, u, f;
        if (t.eventType != X && (i > R || n.velocity === r)) {
            var l = t.deltaX - n.deltaX
              , c = t.deltaY - n.deltaY
              , h = lt(i, l, c);
            o = h.x,
            u = h.y,
            s = a(h.x) > a(h.y) ? h.x : h.y,
            f = ct(l, c),
            e.lastInterval = t
        } else
            s = n.velocity,
            o = n.velocityX,
            u = n.velocityY,
            f = n.direction;
        t.velocity = s,
        t.velocityX = o,
        t.velocityY = u,
        t.direction = f
    }
    function at(e) {
        var t = []
          , n = 0;
        while (n < e.pointers.length)
            t[n] = {
                clientX: u(e.pointers[n].clientX),
                clientY: u(e.pointers[n].clientY)
            },
            n++;
        return {
            timeStamp: f(),
            pointers: t,
            center: ft(t),
            deltaX: e.deltaX,
            deltaY: e.deltaY
        }
    }
    function ft(e) {
        var t = e.length;
        if (t === 1)
            return {
                x: u(e[0].clientX),
                y: u(e[0].clientY)
            };
        var n = 0
          , r = 0
          , i = 0;
        while (i < t)
            n += e[i].clientX,
            r += e[i].clientY,
            i++;
        return {
            x: u(n / t),
            y: u(r / t)
        }
    }
    function lt(e, t, n) {
        return {
            x: t / e || 0,
            y: n / e || 0
        }
    }
    function ct(e, t) {
        return e === t ? V : a(e) >= a(t) ? e < 0 ? $ : J : t < 0 ? K : Q
    }
    function ht(e, t, n) {
        n || (n = et);
        var r = t[n[0]] - e[n[0]]
          , i = t[n[1]] - e[n[1]];
        return Math.sqrt(r * r + i * i)
    }
    function pt(e, t, n) {
        n || (n = et);
        var r = t[n[0]] - e[n[0]]
          , i = t[n[1]] - e[n[1]];
        return Math.atan2(i, r) * 180 / Math.PI
    }
    function dt(e, t) {
        return pt(t[1], t[0], tt) + pt(e[1], e[0], tt)
    }
    function vt(e, t) {
        return ht(t[0], t[1], tt) / ht(e[0], e[1], tt)
    }
    function bt() {
        this.evEl = gt,
        this.evWin = yt,
        this.pressed = !1,
        nt.apply(this, arguments)
    }
    function Tt() {
        this.evEl = St,
        this.evWin = xt,
        nt.apply(this, arguments),
        this.store = this.manager.session.pointerEvents = []
    }
    function Lt() {
        this.evTarget = Ct,
        this.evWin = kt,
        this.started = !1,
        nt.apply(this, arguments)
    }
    function At(e, t) {
        var n = k(e.touches)
          , r = k(e.changedTouches);
        return t & (W | X) && (n = L(n.concat(r), "identifier", !0)),
        [n, r]
    }
    function _t() {
        this.evTarget = Mt,
        this.targetIds = {},
        nt.apply(this, arguments)
    }
    function Dt(e, t) {
        var n = k(e.touches)
          , r = this.targetIds;
        if (t & (U | z) && n.length === 1)
            return r[n[0].identifier] = !0,
            [n, n];
        var i, s, o = k(e.changedTouches), u = [], a = this.target;
        s = n.filter(function(e) {
            return x(e.target, a)
        });
        if (t === U) {
            i = 0;
            while (i < s.length)
                r[s[i].identifier] = !0,
                i++
        }
        i = 0;
        while (i < o.length)
            r[o[i].identifier] && u.push(o[i]),
            t & (W | X) && delete r[o[i].identifier],
            i++;
        if (!u.length)
            return;
        return [L(s.concat(u), "identifier", !0), u]
    }
    function Bt() {
        nt.apply(this, arguments);
        var e = y(this.handler, this);
        this.touch = new _t(this.manager,e),
        this.mouse = new bt(this.manager,e),
        this.primaryTouch = null,
        this.lastTouches = []
    }
    function jt(e, t) {
        e & U ? (this.primaryTouch = t.changedPointers[0].identifier,
        Ft.call(this, t)) : e & (W | X) && Ft.call(this, t)
    }
    function Ft(e) {
        var t = e.changedPointers[0];
        if (t.identifier === this.primaryTouch) {
            var n = {
                x: t.clientX,
                y: t.clientY
            };
            this.lastTouches.push(n);
            var r = this.lastTouches
              , i = function() {
                var e = r.indexOf(n);
                e > -1 && r.splice(e, 1)
            };
            setTimeout(i, Pt)
        }
    }
    function It(e) {
        var t = e.srcEvent.clientX
          , n = e.srcEvent.clientY;
        for (var r = 0; r < this.lastTouches.length; r++) {
            var i = this.lastTouches[r]
              , s = Math.abs(t - i.x)
              , o = Math.abs(n - i.y);
            if (s <= Ht && o <= Ht)
                return !0
        }
        return !1
    }
    function Kt(e, t) {
        this.manager = e,
        this.set(t)
    }
    function Qt(e) {
        if (T(e, Xt))
            return Xt;
        var t = T(e, Vt)
          , n = T(e, $t);
        return t && n ? Xt : t || n ? t ? Vt : $t : T(e, Wt) ? Wt : zt
    }
    function Gt() {
        if (!Rt)
            return !1;
        var t = {}
          , n = e.CSS && e.CSS.supports;
        return ["auto", "manipulation", "pan-y", "pan-x", "pan-x pan-y", "none"].forEach(function(r) {
            t[r] = n ? e.CSS.supports("touch-action", r) : !0
        }),
        t
    }
    function on(e) {
        this.options = d({}, this.defaults, e || {}),
        this.id = M(),
        this.manager = null,
        this.options.enable = w(this.options.enable, !0),
        this.state = Yt,
        this.simultaneous = {},
        this.requireFail = []
    }
    function un(e) {
        return e & rn ? "cancel" : e & tn ? "end" : e & en ? "move" : e & Zt ? "start" : ""
    }
    function an(e) {
        return e == Q ? "down" : e == K ? "up" : e == $ ? "left" : e == J ? "right" : ""
    }
    function fn(e, t) {
        var n = t.manager;
        return n ? n.get(e) : e
    }
    function ln() {
        on.apply(this, arguments)
    }
    function cn() {
        ln.apply(this, arguments),
        this.pX = null,
        this.pY = null
    }
    function hn() {
        ln.apply(this, arguments)
    }
    function pn() {
        on.apply(this, arguments),
        this._timer = null,
        this._input = null
    }
    function dn() {
        ln.apply(this, arguments)
    }
    function vn() {
        ln.apply(this, arguments)
    }
    function mn() {
        on.apply(this, arguments),
        this.pTime = !1,
        this.pCenter = !1,
        this._timer = null,
        this._input = null,
        this.count = 0
    }
    function gn(e, t) {
        return t = t || {},
        t.recognizers = w(t.recognizers, gn.defaults.preset),
        new wn(e,t)
    }
    function wn(e, t) {
        this.options = d({}, gn.defaults, t || {}),
        this.options.inputTarget = this.options.inputTarget || e,
        this.handlers = {},
        this.session = {},
        this.recognizers = [],
        this.oldCssProps = {},
        this.element = e,
        this.input = rt(this),
        this.touchAction = new Kt(this,this.options.touchAction),
        En(this, !0),
        h(this.options.recognizers, function(e) {
            var t = this.add(new e[0](e[1]));
            e[2] && t.recognizeWith(e[2]),
            e[3] && t.requireFailure(e[3])
        }, this)
    }
    function En(e, t) {
        var n = e.element;
        if (!n.style)
            return;
        var r;
        h(e.options.cssProps, function(i, s) {
            r = A(n.style, s),
            t ? (e.oldCssProps[r] = n.style[r],
            n.style[r] = i) : n.style[r] = e.oldCssProps[r] || ""
        }),
        t || (e.oldCssProps = {})
    }
    function Sn(e, n) {
        var r = t.createEvent("Event");
        r.initEvent(e, !0, !0),
        r.gesture = n,
        n.target.dispatchEvent(r)
    }
    var i = ["", "webkit", "Moz", "MS", "ms", "o"], s = t.createElement("div"), o = "function", u = Math.round, a = Math.abs, f = Date.now, d;
    typeof Object.assign != "function" ? d = function(t) {
        if (t === r || t === null)
            throw new TypeError("Cannot convert undefined or null to object");
        var n = Object(t);
        for (var i = 1; i < arguments.length; i++) {
            var s = arguments[i];
            if (s !== r && s !== null)
                for (var o in s)
                    s.hasOwnProperty(o) && (n[o] = s[o])
        }
        return n
    }
    : d = Object.assign;
    var v = p(function(t, n, i) {
        var s = Object.keys(n)
          , o = 0;
        while (o < s.length) {
            if (!i || i && t[s[o]] === r)
                t[s[o]] = n[s[o]];
            o++
        }
        return t
    }, "extend", "Use `assign`.")
      , m = p(function(t, n) {
        return v(t, n, !0)
    }, "merge", "Use `assign`.")
      , O = 1
      , D = /mobile|tablet|ip(ad|hone|od)|android/i
      , P = "ontouchstart"in e
      , H = A(e, "PointerEvent") !== r
      , B = P && D.test(navigator.userAgent)
      , j = "touch"
      , F = "pen"
      , I = "mouse"
      , q = "kinect"
      , R = 25
      , U = 1
      , z = 2
      , W = 4
      , X = 8
      , V = 1
      , $ = 2
      , J = 4
      , K = 8
      , Q = 16
      , G = $ | J
      , Y = K | Q
      , Z = G | Y
      , et = ["x", "y"]
      , tt = ["clientX", "clientY"];
    nt.prototype = {
        handler: function() {},
        init: function() {
            this.evEl && E(this.element, this.evEl, this.domHandler),
            this.evTarget && E(this.target, this.evTarget, this.domHandler),
            this.evWin && E(_(this.element), this.evWin, this.domHandler)
        },
        destroy: function() {
            this.evEl && S(this.element, this.evEl, this.domHandler),
            this.evTarget && S(this.target, this.evTarget, this.domHandler),
            this.evWin && S(_(this.element), this.evWin, this.domHandler)
        }
    };
    var mt = {
        mousedown: U,
        mousemove: z,
        mouseup: W
    }
      , gt = "mousedown"
      , yt = "mousemove mouseup";
    g(bt, nt, {
        handler: function(t) {
            var n = mt[t.type];
            n & U && t.button === 0 && (this.pressed = !0),
            n & z && t.which !== 1 && (n = W);
            if (!this.pressed)
                return;
            n & W && (this.pressed = !1),
            this.callback(this.manager, n, {
                pointers: [t],
                changedPointers: [t],
                pointerType: I,
                srcEvent: t
            })
        }
    });
    var wt = {
        pointerdown: U,
        pointermove: z,
        pointerup: W,
        pointercancel: X,
        pointerout: X
    }
      , Et = {
        2: j,
        3: F,
        4: I,
        5: q
    }
      , St = "pointerdown"
      , xt = "pointermove pointerup pointercancel";
    e.MSPointerEvent && !e.PointerEvent && (St = "MSPointerDown",
    xt = "MSPointerMove MSPointerUp MSPointerCancel"),
    g(Tt, nt, {
        handler: function(t) {
            var n = this.store
              , r = !1
              , i = t.type.toLowerCase().replace("ms", "")
              , s = wt[i]
              , o = Et[t.pointerType] || t.pointerType
              , u = o == j
              , a = C(n, t.pointerId, "pointerId");
            s & U && (t.button === 0 || u) ? a < 0 && (n.push(t),
            a = n.length - 1) : s & (W | X) && (r = !0);
            if (a < 0)
                return;
            n[a] = t,
            this.callback(this.manager, s, {
                pointers: n,
                changedPointers: [t],
                pointerType: o,
                srcEvent: t
            }),
            r && n.splice(a, 1)
        }
    });
    var Nt = {
        touchstart: U,
        touchmove: z,
        touchend: W,
        touchcancel: X
    }
      , Ct = "touchstart"
      , kt = "touchstart touchmove touchend touchcancel";
    g(Lt, nt, {
        handler: function(t) {
            var n = Nt[t.type];
            n === U && (this.started = !0);
            if (!this.started)
                return;
            var r = At.call(this, t, n);
            n & (W | X) && r[0].length - r[1].length === 0 && (this.started = !1),
            this.callback(this.manager, n, {
                pointers: r[0],
                changedPointers: r[1],
                pointerType: j,
                srcEvent: t
            })
        }
    });
    var Ot = {
        touchstart: U,
        touchmove: z,
        touchend: W,
        touchcancel: X
    }
      , Mt = "touchstart touchmove touchend touchcancel";
    g(_t, nt, {
        handler: function(t) {
            var n = Ot[t.type]
              , r = Dt.call(this, t, n);
            if (!r)
                return;
            this.callback(this.manager, n, {
                pointers: r[0],
                changedPointers: r[1],
                pointerType: j,
                srcEvent: t
            })
        }
    });
    var Pt = 2500
      , Ht = 25;
    g(Bt, nt, {
        handler: function(t, n, r) {
            var i = r.pointerType == j
              , s = r.pointerType == I;
            if (s && r.sourceCapabilities && r.sourceCapabilities.firesTouchEvents)
                return;
            if (i)
                jt.call(this, n, r);
            else if (s && It.call(this, r))
                return;
            this.callback(t, n, r)
        },
        destroy: function() {
            this.touch.destroy(),
            this.mouse.destroy()
        }
    });
    var qt = A(s.style, "touchAction")
      , Rt = qt !== r
      , Ut = "compute"
      , zt = "auto"
      , Wt = "manipulation"
      , Xt = "none"
      , Vt = "pan-x"
      , $t = "pan-y"
      , Jt = Gt();
    Kt.prototype = {
        set: function(e) {
            e == Ut && (e = this.compute()),
            Rt && this.manager.element.style && Jt[e] && (this.manager.element.style[qt] = e),
            this.actions = e.toLowerCase().trim()
        },
        update: function() {
            this.set(this.manager.options.touchAction)
        },
        compute: function() {
            var e = [];
            return h(this.manager.recognizers, function(t) {
                b(t.options.enable, [t]) && (e = e.concat(t.getTouchAction()))
            }),
            Qt(e.join(" "))
        },
        preventDefaults: function(e) {
            var t = e.srcEvent
              , n = e.offsetDirection;
            if (this.manager.session.prevented) {
                t.preventDefault();
                return
            }
            var r = this.actions
              , i = T(r, Xt) && !Jt[Xt]
              , s = T(r, $t) && !Jt[$t]
              , o = T(r, Vt) && !Jt[Vt];
            if (i) {
                var u = e.pointers.length === 1
                  , a = e.distance < 2
                  , f = e.deltaTime < 250;
                if (u && a && f)
                    return
            }
            if (o && s)
                return;
            if (i || s && n & G || o && n & Y)
                return this.preventSrc(t)
        },
        preventSrc: function(e) {
            this.manager.session.prevented = !0,
            e.preventDefault()
        }
    };
    var Yt = 1
      , Zt = 2
      , en = 4
      , tn = 8
      , nn = tn
      , rn = 16
      , sn = 32;
    on.prototype = {
        defaults: {},
        set: function(e) {
            return d(this.options, e),
            this.manager && this.manager.touchAction.update(),
            this
        },
        recognizeWith: function(e) {
            if (c(e, "recognizeWith", this))
                return this;
            var t = this.simultaneous;
            return e = fn(e, this),
            t[e.id] || (t[e.id] = e,
            e.recognizeWith(this)),
            this
        },
        dropRecognizeWith: function(e) {
            return c(e, "dropRecognizeWith", this) ? this : (e = fn(e, this),
            delete this.simultaneous[e.id],
            this)
        },
        requireFailure: function(e) {
            if (c(e, "requireFailure", this))
                return this;
            var t = this.requireFail;
            return e = fn(e, this),
            C(t, e) === -1 && (t.push(e),
            e.requireFailure(this)),
            this
        },
        dropRequireFailure: function(e) {
            if (c(e, "dropRequireFailure", this))
                return this;
            e = fn(e, this);
            var t = C(this.requireFail, e);
            return t > -1 && this.requireFail.splice(t, 1),
            this
        },
        hasRequireFailures: function() {
            return this.requireFail.length > 0
        },
        canRecognizeWith: function(e) {
            return !!this.simultaneous[e.id]
        },
        emit: function(e) {
            function r(n) {
                t.manager.emit(n, e)
            }
            var t = this
              , n = this.state;
            n < tn && r(t.options.event + un(n)),
            r(t.options.event),
            e.additionalEvent && r(e.additionalEvent),
            n >= tn && r(t.options.event + un(n))
        },
        tryEmit: function(e) {
            if (this.canEmit())
                return this.emit(e);
            this.state = sn
        },
        canEmit: function() {
            var e = 0;
            while (e < this.requireFail.length) {
                if (!(this.requireFail[e].state & (sn | Yt)))
                    return !1;
                e++
            }
            return !0
        },
        recognize: function(e) {
            var t = d({}, e);
            if (!b(this.options.enable, [this, t])) {
                this.reset(),
                this.state = sn;
                return
            }
            this.state & (nn | rn | sn) && (this.state = Yt),
            this.state = this.process(t),
            this.state & (Zt | en | tn | rn) && this.tryEmit(t)
        },
        process: function(e) {},
        getTouchAction: function() {},
        reset: function() {}
    },
    g(ln, on, {
        defaults: {
            pointers: 1
        },
        attrTest: function(e) {
            var t = this.options.pointers;
            return t === 0 || e.pointers.length === t
        },
        process: function(e) {
            var t = this.state
              , n = e.eventType
              , r = t & (Zt | en)
              , i = this.attrTest(e);
            if (r && (n & X || !i))
                return t | rn;
            if (r || i)
                return n & W ? t | tn : t & Zt ? t | en : Zt;
            return sn
        }
    }),
    g(cn, ln, {
        defaults: {
            event: "pan",
            threshold: 10,
            pointers: 1,
            direction: Z
        },
        getTouchAction: function() {
            var e = this.options.direction
              , t = [];
            return e & G && t.push($t),
            e & Y && t.push(Vt),
            t
        },
        directionTest: function(e) {
            var t = this.options
              , n = !0
              , r = e.distance
              , i = e.direction
              , s = e.deltaX
              , o = e.deltaY;
            return i & t.direction || (t.direction & G ? (i = s === 0 ? V : s < 0 ? $ : J,
            n = s != this.pX,
            r = Math.abs(e.deltaX)) : (i = o === 0 ? V : o < 0 ? K : Q,
            n = o != this.pY,
            r = Math.abs(e.deltaY))),
            e.direction = i,
            n && r > t.threshold && i & t.direction
        },
        attrTest: function(e) {
            return ln.prototype.attrTest.call(this, e) && (this.state & Zt || !(this.state & Zt) && this.directionTest(e))
        },
        emit: function(e) {
            this.pX = e.deltaX,
            this.pY = e.deltaY;
            var t = an(e.direction);
            t && (e.additionalEvent = this.options.event + t),
            this._super.emit.call(this, e)
        }
    }),
    g(hn, ln, {
        defaults: {
            event: "pinch",
            threshold: 0,
            pointers: 2
        },
        getTouchAction: function() {
            return [Xt]
        },
        attrTest: function(e) {
            return this._super.attrTest.call(this, e) && (Math.abs(e.scale - 1) > this.options.threshold || this.state & Zt)
        },
        emit: function(e) {
            if (e.scale !== 1) {
                var t = e.scale < 1 ? "in" : "out";
                e.additionalEvent = this.options.event + t
            }
            this._super.emit.call(this, e)
        }
    }),
    g(pn, on, {
        defaults: {
            event: "press",
            pointers: 1,
            time: 251,
            threshold: 9
        },
        getTouchAction: function() {
            return [zt]
        },
        process: function(e) {
            var t = this.options
              , n = e.pointers.length === t.pointers
              , r = e.distance < t.threshold
              , i = e.deltaTime > t.time;
            this._input = e;
            if (!r || !n || e.eventType & (W | X) && !i)
                this.reset();
            else if (e.eventType & U)
                this.reset(),
                this._timer = l(function() {
                    this.state = nn,
                    this.tryEmit()
                }, t.time, this);
            else if (e.eventType & W)
                return nn;
            return sn
        },
        reset: function() {
            clearTimeout(this._timer)
        },
        emit: function(e) {
            if (this.state !== nn)
                return;
            e && e.eventType & W ? this.manager.emit(this.options.event + "up", e) : (this._input.timeStamp = f(),
            this.manager.emit(this.options.event, this._input))
        }
    }),
    g(dn, ln, {
        defaults: {
            event: "rotate",
            threshold: 0,
            pointers: 2
        },
        getTouchAction: function() {
            return [Xt]
        },
        attrTest: function(e) {
            return this._super.attrTest.call(this, e) && (Math.abs(e.rotation) > this.options.threshold || this.state & Zt)
        }
    }),
    g(vn, ln, {
        defaults: {
            event: "swipe",
            threshold: 10,
            velocity: .3,
            direction: G | Y,
            pointers: 1
        },
        getTouchAction: function() {
            return cn.prototype.getTouchAction.call(this)
        },
        attrTest: function(e) {
            var t = this.options.direction, n;
            return t & (G | Y) ? n = e.overallVelocity : t & G ? n = e.overallVelocityX : t & Y && (n = e.overallVelocityY),
            this._super.attrTest.call(this, e) && t & e.offsetDirection && e.distance > this.options.threshold && e.maxPointers == this.options.pointers && a(n) > this.options.velocity && e.eventType & W
        },
        emit: function(e) {
            var t = an(e.offsetDirection);
            t && this.manager.emit(this.options.event + t, e),
            this.manager.emit(this.options.event, e)
        }
    }),
    g(mn, on, {
        defaults: {
            event: "tap",
            pointers: 1,
            taps: 1,
            interval: 300,
            time: 250,
            threshold: 9,
            posThreshold: 10
        },
        getTouchAction: function() {
            return [Wt]
        },
        process: function(e) {
            var t = this.options
              , n = e.pointers.length === t.pointers
              , r = e.distance < t.threshold
              , i = e.deltaTime < t.time;
            this.reset();
            if (e.eventType & U && this.count === 0)
                return this.failTimeout();
            if (r && i && n) {
                if (e.eventType != W)
                    return this.failTimeout();
                var s = this.pTime ? e.timeStamp - this.pTime < t.interval : !0
                  , o = !this.pCenter || ht(this.pCenter, e.center) < t.posThreshold;
                this.pTime = e.timeStamp,
                this.pCenter = e.center,
                !o || !s ? this.count = 1 : this.count += 1,
                this._input = e;
                var u = this.count % t.taps;
                if (u === 0)
                    return this.hasRequireFailures() ? (this._timer = l(function() {
                        this.state = nn,
                        this.tryEmit()
                    }, t.interval, this),
                    Zt) : nn
            }
            return sn
        },
        failTimeout: function() {
            return this._timer = l(function() {
                this.state = sn
            }, this.options.interval, this),
            sn
        },
        reset: function() {
            clearTimeout(this._timer)
        },
        emit: function() {
            this.state == nn && (this._input.tapCount = this.count,
            this.manager.emit(this.options.event, this._input))
        }
    }),
    gn.VERSION = "2.0.8",
    gn.defaults = {
        domEvents: !1,
        touchAction: Ut,
        enable: !0,
        inputTarget: null,
        inputClass: null,
        preset: [[dn, {
            enable: !1
        }], [hn, {
            enable: !1
        }, ["rotate"]], [vn, {
            direction: G
        }], [cn, {
            direction: G
        }, ["swipe"]], [mn], [mn, {
            event: "doubletap",
            taps: 2
        }, ["tap"]], [pn]],
        cssProps: {
            userSelect: "none",
            touchSelect: "none",
            touchCallout: "none",
            contentZooming: "none",
            userDrag: "none",
            tapHighlightColor: "rgba(0,0,0,0)"
        }
    };
    var yn = 1
      , bn = 2;
    wn.prototype = {
        set: function(e) {
            return d(this.options, e),
            e.touchAction && this.touchAction.update(),
            e.inputTarget && (this.input.destroy(),
            this.input.target = e.inputTarget,
            this.input.init()),
            this
        },
        stop: function(e) {
            this.session.stopped = e ? bn : yn
        },
        recognize: function(e) {
            var t = this.session;
            if (t.stopped)
                return;
            this.touchAction.preventDefaults(e);
            var n, r = this.recognizers, i = t.curRecognizer;
            if (!i || i && i.state & nn)
                i = t.curRecognizer = null;
            var s = 0;
            while (s < r.length)
                n = r[s],
                t.stopped !== bn && (!i || n == i || n.canRecognizeWith(i)) ? n.recognize(e) : n.reset(),
                !i && n.state & (Zt | en | tn) && (i = t.curRecognizer = n),
                s++
        },
        get: function(e) {
            if (e instanceof on)
                return e;
            var t = this.recognizers;
            for (var n = 0; n < t.length; n++)
                if (t[n].options.event == e)
                    return t[n];
            return null
        },
        add: function(e) {
            if (c(e, "add", this))
                return this;
            var t = this.get(e.options.event);
            return t && this.remove(t),
            this.recognizers.push(e),
            e.manager = this,
            this.touchAction.update(),
            e
        },
        remove: function(e) {
            if (c(e, "remove", this))
                return this;
            e = this.get(e);
            if (e) {
                var t = this.recognizers
                  , n = C(t, e);
                n !== -1 && (t.splice(n, 1),
                this.touchAction.update())
            }
            return this
        },
        on: function(e, t) {
            if (e === r)
                return;
            if (t === r)
                return;
            var n = this.handlers;
            return h(N(e), function(e) {
                n[e] = n[e] || [],
                n[e].push(t)
            }),
            this
        },
        off: function(e, t) {
            if (e === r)
                return;
            var n = this.handlers;
            return h(N(e), function(e) {
                t ? n[e] && n[e].splice(C(n[e], t), 1) : delete n[e]
            }),
            this
        },
        emit: function(e, t) {
            this.options.domEvents && Sn(e, t);
            var n = this.handlers[e] && this.handlers[e].slice();
            if (!n || !n.length)
                return;
            t.type = e,
            t.preventDefault = function() {
                t.srcEvent.preventDefault()
            }
            ;
            var r = 0;
            while (r < n.length)
                n[r](t),
                r++
        },
        destroy: function() {
            this.element && En(this, !1),
            this.handlers = {},
            this.session = {},
            this.input.destroy(),
            this.element = null
        }
    },
    d(gn, {
        INPUT_START: U,
        INPUT_MOVE: z,
        INPUT_END: W,
        INPUT_CANCEL: X,
        STATE_POSSIBLE: Yt,
        STATE_BEGAN: Zt,
        STATE_CHANGED: en,
        STATE_ENDED: tn,
        STATE_RECOGNIZED: nn,
        STATE_CANCELLED: rn,
        STATE_FAILED: sn,
        DIRECTION_NONE: V,
        DIRECTION_LEFT: $,
        DIRECTION_RIGHT: J,
        DIRECTION_UP: K,
        DIRECTION_DOWN: Q,
        DIRECTION_HORIZONTAL: G,
        DIRECTION_VERTICAL: Y,
        DIRECTION_ALL: Z,
        Manager: wn,
        Input: nt,
        TouchAction: Kt,
        TouchInput: _t,
        MouseInput: bt,
        PointerEventInput: Tt,
        TouchMouseInput: Bt,
        SingleTouchInput: Lt,
        Recognizer: on,
        AttrRecognizer: ln,
        Tap: mn,
        Pan: cn,
        Swipe: vn,
        Pinch: hn,
        Rotate: dn,
        Press: pn,
        on: E,
        off: S,
        each: h,
        merge: m,
        extend: v,
        assign: d,
        inherit: g,
        bindFn: y,
        prefixed: A
    });
    var xn = typeof e != "undefined" ? e : typeof self != "undefined" ? self : {};
    xn.Hammer = gn,
    typeof define == "function" && define.amd ? define(function() {
        return gn
    }) : typeof module != "undefined" && module.exports ? module.exports = gn : e[n] = gn
}
)(window, document, "Hammer");
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n() : typeof define == "function" && define.amd ? define([], n) : typeof exports == "object" ? exports.Component = n() : (t.eg = t.eg || {},
    t.eg.Component = n())
}
)(this, function() {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.l = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.d = function(e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        }
        ,
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e["default"]
            }
            : function() {
                return e
            }
            ;
            return n.d(t, "a", t),
            t
        }
        ,
        n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        n.p = "",
        n(n.s = 0)
    }([function(e, t, n) {
        "use strict";
        function s(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        var r = n(1)
          , i = s(r);
        i["default"].VERSION = "2.0.0",
        e.exports = i["default"]
    }
    , function(e, t, n) {
        "use strict";
        function i(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        t.__esModule = !0;
        var r = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(e) {
            return typeof e
        }
        : function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }
          , s = function() {
            function e() {
                i(this, e),
                this._eventHandler = {},
                this.options = {}
            }
            return e.prototype.trigger = function(t) {
                var n = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {}
                  , r = this._eventHandler[t] || []
                  , i = r.length > 0;
                if (!i)
                    return !0;
                r = r.concat(),
                n.eventType = t;
                var s = !1
                  , o = [n]
                  , u = 0;
                n.stop = function() {
                    s = !0
                }
                ;
                for (var a = arguments.length, f = Array(a > 2 ? a - 2 : 0), l = 2; l < a; l++)
                    f[l - 2] = arguments[l];
                f.length >= 1 && (o = o.concat(f));
                for (u = 0; r[u]; u++)
                    r[u].apply(this, o);
                return !s
            }
            ,
            e.prototype.once = function(t, n) {
                if ((typeof t == "undefined" ? "undefined" : r(t)) === "object" && typeof n == "undefined") {
                    var i = t
                      , s = void 0;
                    for (s in i)
                        this.once(s, i[s]);
                    return this
                }
                if (typeof t == "string" && typeof n == "function") {
                    var o = this;
                    this.on(t, function u() {
                        for (var e = arguments.length, r = Array(e), i = 0; i < e; i++)
                            r[i] = arguments[i];
                        n.apply(o, r),
                        o.off(t, u)
                    })
                }
                return this
            }
            ,
            e.prototype.hasOn = function(t) {
                return !!this._eventHandler[t]
            }
            ,
            e.prototype.on = function(t, n) {
                if ((typeof t == "undefined" ? "undefined" : r(t)) === "object" && typeof n == "undefined") {
                    var i = t
                      , s = void 0;
                    for (s in i)
                        this.on(s, i[s]);
                    return this
                }
                if (typeof t == "string" && typeof n == "function") {
                    var o = this._eventHandler[t];
                    typeof o == "undefined" && (this._eventHandler[t] = [],
                    o = this._eventHandler[t]),
                    o.push(n)
                }
                return this
            }
            ,
            e.prototype.off = function(t, n) {
                if (typeof t == "undefined")
                    return this._eventHandler = {},
                    this;
                if (typeof n == "undefined") {
                    if (typeof t == "string")
                        return this._eventHandler[t] = undefined,
                        this;
                    var r = t
                      , i = void 0;
                    for (i in r)
                        this.off(i, r[i]);
                    return this
                }
                var s = this._eventHandler[t];
                if (s) {
                    var o = void 0
                      , u = void 0;
                    for (o = 0; (u = s[o]) !== undefined; o++)
                        if (u === n) {
                            s = s.splice(o, 1);
                            break
                        }
                }
                return this
            }
            ,
            e
        }();
        t["default"] = s,
        e.exports = t["default"]
    }
    ])
});
(function(e) {
    "use strict";
    window[e] || (window[e] = {}),
    window[e].Class = function(e) {
        var t = function() {
            typeof e.construct == "function" && e.construct.apply(this, arguments)
        };
        return t.prototype = e,
        t.prototype.instance = function() {
            return this
        }
        ,
        t.prototype.constructor = t,
        t
    }
    ,
    window[e].Class.extend = function(e, t) {
        var n = function() {
            e.apply(this, arguments),
            typeof t.construct == "function" && t.construct.apply(this, arguments)
        }
          , r = function() {};
        r.prototype = e.prototype;
        var i = new r;
        for (var s in t)
            i[s] = t[s];
        return i.constructor = n,
        n.prototype = i,
        n
    }
}
)("eg");
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n() : typeof define == "function" && define.amd ? define([], n) : typeof exports == "object" ? exports.agent = n() : (t.eg = t.eg || {},
    t.eg.agent = n())
}
)(this, function() {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.l = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.d = function(e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        }
        ,
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e["default"]
            }
            : function() {
                return e
            }
            ;
            return n.d(t, "a", t),
            t
        }
        ,
        n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        n.p = "",
        n(n.s = 0)
    }([function(e, t, n) {
        "use strict";
        function s(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        var r = n(1)
          , i = s(r);
        e.exports = i["default"]
    }
    , function(e, t, n) {
        "use strict";
        function o(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        function u() {
            var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : r.navigator.userAgent;
            s["default"].setUa(e);
            var t = {
                os: s["default"].getOs(),
                browser: s["default"].getBrowser(),
                isMobile: s["default"].getIsMobile()
            };
            return t.browser.name = t.browser.name.toLowerCase(),
            t.os.name = t.os.name.toLowerCase(),
            t.os.version = t.os.version.toLowerCase(),
            t.os.name === "ios" && t.browser.webview && (t.browser.version = "-1"),
            t
        }
        t.__esModule = !0;
        var r = n(2)
          , i = n(3)
          , s = o(i);
        u.VERSION = "2.1.2",
        t["default"] = u,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = typeof window != "undefined" && window || {}
          , i = t.RegExp = r.RegExp
          , s = t.navigator = r.navigator
    }
    , function(e, t, n) {
        "use strict";
        function s(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        function u(e) {
            o = e
        }
        function a(e, t) {
            return t && t.test ? !!t.test(e) : e.indexOf(t) > -1
        }
        function f(e, t) {
            var n = e.filter(function(e) {
                return a(o, e.criteria)
            })[0];
            return n && n.identity || t.name
        }
        function l(e, t) {
            return e.filter(function(e) {
                var n = e.criteria
                  , r = (new RegExp(e.identity,"i")).test(t);
                return (n ? r && a(o, n) : r) ? !0 : !1
            })[0]
        }
        function c() {
            return f(i["default"].browser, i["default"].defaultString.browser)
        }
        function h(e) {
            var t = l(i["default"].browser, e);
            return t || (t = {
                criteria: e,
                versionSearch: e,
                identity: e
            }),
            t
        }
        function p(e, t) {
            var n = i["default"].defaultString.browser.version
              , r = (new RegExp("(" + e + ")","i")).exec(t);
            if (!r)
                return n;
            var s = r.index
              , o = r[0];
            if (s > -1) {
                var u = s + o.length + 1;
                n = t.substring(u).split(" ")[0].replace(/_/g, ".").replace(/;|\)/g, "")
            }
            return n
        }
        function d(e) {
            if (!e)
                return undefined;
            var t = h(e)
              , n = t.versionSearch || e
              , r = p(n, o);
            return r
        }
        function v() {
            var e = i["default"].webview
              , t = void 0;
            return e.filter(function(e) {
                return a(o, e.criteria)
            }).some(function(e) {
                return t = p(e.browserVersionSearch, o),
                a(o, e.webviewToken) || a(t, e.webviewBrowserVersion) ? !0 : !1
            })
        }
        function m(e) {
            return l(i["default"].os, e)
        }
        function g() {
            return f(i["default"].os, i["default"].defaultString.os)
        }
        function y(e) {
            var t = m(e) || {}
              , n = i["default"].defaultString.os.version
              , r = void 0;
            if (!e)
                return undefined;
            if (t.versionAlias)
                return t.versionAlias;
            var s = t.versionSearch || e
              , u = new RegExp("(" + s + ")\\s([\\d_\\.]+|\\d_0)","i")
              , a = u.exec(o);
            return a && (r = u.exec(o)[2].replace(/_/g, ".").replace(/;|\)/g, "")),
            r || n
        }
        function b() {
            var e = g()
              , t = y(e);
            return {
                name: e,
                version: t
            }
        }
        function w() {
            var e = c()
              , t = d(e);
            return {
                name: e,
                version: t,
                webview: v()
            }
        }
        function E() {
            return o.indexOf("Mobi") !== -1
        }
        t.__esModule = !0;
        var r = n(4)
          , i = s(r)
          , o = void 0;
        t["default"] = {
            getOs: b,
            getBrowser: w,
            getIsMobile: E,
            setUa: u
        },
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = {
            browser: [{
                criteria: "PhantomJS",
                identity: "PhantomJS"
            }, {
                criteria: /Whale/,
                identity: "Whale",
                versionSearch: "Whale"
            }, {
                criteria: /Edge/,
                identity: "Edge",
                versionSearch: "Edge"
            }, {
                criteria: /MSIE|Trident|Windows Phone/,
                identity: "IE",
                versionSearch: "IEMobile|MSIE|rv"
            }, {
                criteria: /MiuiBrowser/,
                identity: "MIUI Browser",
                versionSearch: "MiuiBrowser"
            }, {
                criteria: /SamsungBrowser/,
                identity: "Samsung Internet",
                versionSearch: "SamsungBrowser"
            }, {
                criteria: /SAMSUNG /,
                identity: "Samsung Internet",
                versionSearch: "Version"
            }, {
                criteria: /Chrome|CriOS/,
                identity: "Chrome"
            }, {
                criteria: /Android/,
                identity: "Android Browser",
                versionSearch: "Version"
            }, {
                criteria: /iPhone|iPad/,
                identity: "Safari",
                versionSearch: "Version"
            }, {
                criteria: "Apple",
                identity: "Safari",
                versionSearch: "Version"
            }, {
                criteria: "Firefox",
                identity: "Firefox"
            }],
            os: [{
                criteria: /Windows Phone/,
                identity: "Windows Phone",
                versionSearch: "Windows Phone"
            }, {
                criteria: "Windows 2000",
                identity: "Window",
                versionAlias: "5.0"
            }, {
                criteria: /Windows NT/,
                identity: "Window",
                versionSearch: "Windows NT"
            }, {
                criteria: /iPhone|iPad/,
                identity: "iOS",
                versionSearch: "iPhone OS|CPU OS"
            }, {
                criteria: "Mac",
                versionSearch: "OS X",
                identity: "MAC"
            }, {
                criteria: /Android/,
                identity: "Android"
            }, {
                criteria: /Tizen/,
                identity: "Tizen"
            }, {
                criteria: /Web0S/,
                identity: "WebOS"
            }],
            webview: [{
                criteria: /iPhone|iPad/,
                browserVersionSearch: "Version",
                webviewBrowserVersion: /-1/
            }, {
                criteria: /iPhone|iPad|Android/,
                webviewToken: /NAVER|DAUM|; wv/
            }],
            defaultString: {
                browser: {
                    version: "-1",
                    name: "unknown"
                },
                os: {
                    version: "-1",
                    name: "unknown"
                }
            }
        };
        t["default"] = r,
        e.exports = t["default"]
    }
    ])
});
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n() : typeof define == "function" && define.amd ? define("Persist", [], n) : typeof exports == "object" ? exports.Persist = n() : (t.eg = t.eg || {},
    t.eg.Persist = n())
}
)(this, function() {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.l = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.d = function(e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        }
        ,
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e["default"]
            }
            : function() {
                return e
            }
            ;
            return n.d(t, "a", t),
            t
        }
        ,
        n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        n.p = "",
        n(n.s = 2)
    }([function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = typeof window != "undefined" && window || {};
        t.window = r;
        var i = t.console = r.console
          , s = t.document = r.document
          , o = t.history = r.history
          , u = t.localStorage = r.localStorage
          , a = t.location = r.location
          , f = t.sessionStorage = r.sessionStorage
          , l = t.navigator = r.navigator
          , c = t.JSON = r.JSON
          , h = t.RegExp = r.RegExp
          , p = t.parseFloat = r.parseFloat
          , d = t.performance = r.performance
    }
    , function(e, t, n) {
        "use strict";
        function u() {
            return r.performance && r.performance.navigation.type === s
        }
        t.__esModule = !0;
        var r = n(0)
          , i = r.navigator.userAgent
          , s = r.performance && r.performance.navigation.TYPE_BACK_FORWARD || 2
          , o = function() {
            var e = (new r.RegExp("iPhone|iPad","i")).test(i)
              , t = (new r.RegExp("Mac","i")).test(i) && !(new r.RegExp("Chrome","i")).test(i) && (new r.RegExp("Apple","i")).test(i)
              , n = (new r.RegExp("Android ","i")).test(i)
              , s = (new r.RegExp("wv; |inapp;","i")).test(i)
              , o = n ? (0,
            r.parseFloat)((new r.RegExp("(Android)\\s([\\d_\\.]+|\\d_0)","i")).exec(i)[2]) : undefined;
            return !(e || t || n && (o <= 4.3 && s || o < 3))
        }();
        t["default"] = {
            isBackForwardNavigated: u,
            isNeeded: o
        },
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function s(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        var r = n(3)
          , i = s(r);
        i["default"].VERSION = "2.1.1",
        e.exports = i["default"]
    }
    , function(e, t, n) {
        "use strict";
        function u(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        function a(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        function f(e, t, n) {
            var r = e;
            r || (r = isNaN(t[0]) ? {} : []);
            var i = t.shift();
            return t.length === 0 ? (r instanceof Array && isNaN(i) && o.console.warn("Don't use key string on array"),
            r[i] = n,
            r) : (r[i] = f(r[i], t, n),
            r)
        }
        t.__esModule = !0;
        var r = n(4)
          , i = u(r)
          , s = n(1)
          , o = n(0)
          , l = function() {
            function e(t, n) {
                a(this, e),
                this.key = t
            }
            return e.prototype.get = function(t) {
                var n = i["default"].getStateByKey(this.key);
                if (!t || t.length === 0)
                    return n;
                var r = t.split(".")
                  , s = n
                  , o = !0;
                for (var u = 0; u < r.length; u++) {
                    if (!s) {
                        o = !1;
                        break
                    }
                    s = s[r[u]]
                }
                return !o || !s ? null : s
            }
            ,
            e.prototype.set = function(t, n) {
                var r = i["default"].getStateByKey(this.key);
                return t.length === 0 ? i["default"].setStateByKey(this.key, n) : i["default"].setStateByKey(this.key, f(r, t.split("."), n)),
                this
            }
            ,
            e.isNeeded = function() {
                return s.isNeeded
            }
            ,
            e
        }();
        l.StorageManager = i["default"],
        t["default"] = l,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function f(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        function c(e) {
            if (!e)
                return undefined;
            var t = "__tmp__" + a["default"];
            try {
                return e.setItem(t, a["default"]),
                e.getItem(t) === a["default"]
            } catch (n) {
                return !1
            }
        }
        function p() {
            console.warn("window.history or session/localStorage has no valid format data to be handled in persist.")
        }
        function d() {
            return h ? i.location.href + a["default"] : undefined
        }
        function v() {
            return h
        }
        function m() {
            var e = void 0
              , t = i.location.href + a["default"]
              , n = void 0;
            h ? n = h.getItem(t) : i.history.state && (r(i.history.state) !== "object" ? n = i.history.state[t] : p());
            if (n === null)
                return {};
            var s = typeof n == "string" && n.length > 0 && n !== "null";
            try {
                e = i.JSON.parse(n);
                var o = !((typeof e == "undefined" ? "undefined" : r(e)) !== "object" || e instanceof Array);
                if (!s || !o)
                    throw new Error
            } catch (u) {
                p(),
                e = {}
            }
            return e
        }
        function g(e) {
            if (!l && !h)
                return undefined;
            var t = m()[e];
            if (t === "null" || typeof t == "undefined")
                t = null;
            return t
        }
        function y(e) {
            var t = i.location.href + a["default"];
            if (h)
                e ? h.setItem(t, i.JSON.stringify(e)) : h.removeItem(t);
            else
                try {
                    var n = i.history.state;
                    (typeof n == "undefined" ? "undefined" : r(n)) === "object" ? (n[t] = i.JSON.stringify(e),
                    i.history.replaceState(n, document.title, i.location.href)) : console.warn("To use a history object, it must be an object that is not a primitive type.")
                } catch (s) {
                    console.warn(s.message)
                }
            e ? i.window[a["default"]] = !0 : delete i.window[a["default"]]
        }
        function b(e, t) {
            if (!l && !h)
                return;
            var n = m();
            n[e] = t,
            y(n)
        }
        function w() {
            y(null)
        }
        t.__esModule = !0;
        var r = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(e) {
            return typeof e
        }
        : function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }
          , i = n(0)
          , s = n(1)
          , o = f(s)
          , u = n(5)
          , a = f(u)
          , l = "replaceState"in i.history && "state"in i.history
          , h = function() {
            var e = void 0;
            return c(i.sessionStorage) ? e = i.sessionStorage : c(i.localStorage) && (e = i.localStorage),
            e
        }();
        !o["default"].isBackForwardNavigated() && w(),
        t["default"] = {
            reset: w,
            setStateByKey: b,
            getStateByKey: g,
            getStorageKey: d,
            getStorage: v
        },
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = "___persist___";
        t["default"] = r,
        e.exports = t["default"]
    }
    ])
});
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n() : typeof define == "function" && define.amd ? define("Persist", [], n) : typeof exports == "object" ? exports.Persist = n() : (t.eg = t.eg || {},
    t.eg.Persist = n())
}
)(this, function() {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.l = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.d = function(e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        }
        ,
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e["default"]
            }
            : function() {
                return e
            }
            ;
            return n.d(t, "a", t),
            t
        }
        ,
        n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        n.p = "",
        n(n.s = 6)
    }({
        0: function(e, t, n) {
            "use strict";
            t.__esModule = !0;
            var r = typeof window != "undefined" && window || {};
            t.window = r;
            var i = t.console = r.console
              , s = t.document = r.document
              , o = t.history = r.history
              , u = t.localStorage = r.localStorage
              , a = t.location = r.location
              , f = t.sessionStorage = r.sessionStorage
              , l = t.navigator = r.navigator
              , c = t.JSON = r.JSON
              , h = t.RegExp = r.RegExp
              , p = t.parseFloat = r.parseFloat
              , d = t.performance = r.performance
        },
        6: function(e, t, n) {
            "use strict";
            t.__esModule = !0;
            var r = n(0);
            t["default"] = function(e) {
                if (!e || !e.Persist)
                    return;
                var t = "KEY___persist___"
                  , n = e.Persist.prototype
                  , r = e.Persist.isNeeded
                  , i = e.Persist.StorageManager;
                return e.Persist = function s(e, n) {
                    if (!(this instanceof s)) {
                        if (arguments.length === 0)
                            return i.getStateByKey(t);
                        if (arguments.length === 1 && typeof e != "string") {
                            var r = e;
                            return i.setStateByKey(t, r),
                            undefined
                        }
                        return arguments.length === 2 && i.setStateByKey(e, n),
                        i.getStateByKey(e)
                    }
                    return this.key = e,
                    undefined
                }
                ,
                e.Persist.isNeeded = r,
                e.Persist.prototype = n,
                e.Persist
            }(r.window.eg),
            e.exports = t["default"]
        }
    })
});
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n() : typeof define == "function" && define.amd ? define("rotate", [], n) : typeof exports == "object" ? exports.rotate = n() : (t.eg = t.eg || {},
    t.eg.rotate = n())
}
)(this, function() {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.l = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.i = function(e) {
            return e
        }
        ,
        n.d = function(e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        }
        ,
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e["default"]
            }
            : function() {
                return e
            }
            ;
            return n.d(t, "a", t),
            t
        }
        ,
        n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        n.p = "",
        n(n.s = 2)
    }([function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = n(1);
        t["default"] = function() {
            function u() {
                var n = void 0
                  , i = void 0
                  , s = void 0;
                if (o === "resize")
                    n = r.document.documentElement.clientWidth,
                    e === -1 ? s = n < r.document.documentElement.clientHeight : n < e ? s = !0 : n === e ? s = t : s = !1;
                else {
                    i = r.window.orientation;
                    if (i === 0 || i === 180)
                        s = !0;
                    else if (i === 90 || i === -90)
                        s = !1
                }
                return s
            }
            function a(i) {
                var o = u();
                s && t !== o && (t = o,
                e = r.document.documentElement.clientWidth,
                n.forEach(function(e) {
                    return e(i, {
                        isVertical: t
                    })
                }))
            }
            function f(t) {
                var n = null;
                if (o === "resize")
                    r.window.setTimeout(function() {
                        return a(t)
                    }, 0);
                else {
                    if (i.os === "android") {
                        var s = r.document.documentElement.clientWidth;
                        if (t.type === "orientationchange" && s === e)
                            return r.window.setTimeout(function() {
                                return f(t)
                            }, 500),
                            !1
                    }
                    n && r.window.clearTimeout(n),
                    n = r.window.setTimeout(function() {
                        return a(t)
                    }, 300)
                }
                return undefined
            }
            var e = -1
              , t = null
              , n = []
              , i = function() {
                var e = r.window.navigator.userAgent
                  , t = e.match(/(iPhone OS|CPU OS|Android)\s([^\s;-]+)/)
                  , n = {
                    os: "",
                    version: ""
                };
                return t && (n.os = t[1].replace(/(?:CPU|iPhone)\sOS/, "ios").toLowerCase(),
                n.version = t[2].replace(/\D/g, ".")),
                n
            }()
              , s = /android|ios/.test(i.os);
            if (!s)
                return undefined;
            var o = function() {
                var e = void 0;
                return i.os === "android" && i.version === "2.1" ? e = "resize" : e = "onorientationchange"in r.window ? "orientationchange" : "resize",
                e
            }();
            return {
                on: function(s) {
                    if (typeof s != "function")
                        return;
                    t = u(),
                    e = r.document.documentElement.clientWidth,
                    n.push(s),
                    n.length === 1 && r.window.addEventListener(o, f)
                },
                off: function(t) {
                    if (typeof t == "function")
                        for (var i = 0, s; s = n[i]; i++)
                            if (s === t) {
                                n.splice(i, 1);
                                break
                            }
                    if (!t || n.length === 0)
                        n.splice(0),
                        r.window.removeEventListener(o, f)
                },
                orientationChange: o,
                isVertical: u,
                triggerRotate: a,
                handler: f
            }
        }(),
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = typeof window != "undefined" && window.Math === Math ? window : typeof self != "undefined" && self.Math === Math ? self : Function("return this")()
          , i = r.document;
        t.window = r,
        t.document = i
    }
    , function(e, t, n) {
        "use strict";
        function s(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        var r = n(0)
          , i = s(r);
        e.exports = i["default"]
    }
    ])
});
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n(require("@egjs/component")) : typeof define == "function" && define.amd ? define("Visible", ["@egjs/component"], n) : typeof exports == "object" ? exports.Visible = n(require("@egjs/component")) : (t.eg = t.eg || {},
    t.eg.Visible = n(t.eg.Component))
}
)(this, function(e) {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.l = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.d = function(e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        }
        ,
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e["default"]
            }
            : function() {
                return e
            }
            ;
            return n.d(t, "a", t),
            t
        }
        ,
        n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        n.p = "",
        n(n.s = 0)
    }([function(e, t, n) {
        "use strict";
        function s(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        var r = n(1)
          , i = s(r);
        e.exports = i["default"]
    }
    , function(e, t, n) {
        "use strict";
        function u(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        function a(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        function f(e, t) {
            if (!e)
                throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || typeof t != "object" && typeof t != "function" ? e : t
        }
        function l(e, t) {
            if (typeof t != "function" && t !== null)
                throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        t.__esModule = !0;
        var r = Object.assign || function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = arguments[t];
                for (var r in n)
                    Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
            }
            return e
        }
          , i = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(e) {
            return typeof e
        }
        : function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }
          , s = n(2)
          , o = u(s);
        typeof Object.create != "function" && (Object.create = function(e, t) {
            function n() {}
            if ((typeof e == "undefined" ? "undefined" : i(e)) !== "object" && typeof e != "function")
                throw new TypeError("Object prototype may only be an Object: " + e);
            if (e === null)
                throw new Error("This browser's implementation of Object.create is a shim and doesn't support 'null' as the first argument.");
            return n.prototype = e,
            new n
        }
        );
        var c = function(e) {
            function t(n, s) {
                a(this, t);
                var o = f(this, e.call(this));
                return o.options = {
                    targetClass: "check_visible",
                    expandSize: 0
                },
                r(o.options, s),
                n === undefined && (o._wrapper = document),
                (typeof n == "undefined" ? "undefined" : i(n)) === "object" ? o._wrapper = n : typeof n == "string" && (o._wrapper = document.querySelector(n)),
                o._wrapper.nodeType && o._wrapper.nodeType === 1 ? o._getAreaRect = o._getWrapperRect : o._getAreaRect = t._getWindowRect,
                o._targets = [],
                o._timer = null,
                o._supportElementsByClassName = function() {
                    var e = document.createElement("div");
                    if (!e.getElementsByClassName)
                        return !1;
                    var t = e.getElementsByClassName("dummy");
                    return e.innerHTML = "<span class='dummy'></span>",
                    t.length === 1
                }(),
                o.refresh(),
                o
            }
            return l(t, e),
            t._hasClass = function(t, n) {
                return t.classList ? t.classList.contains(n) : (new RegExp("(^| )" + n + "( |$)","gi")).test(t.className)
            }
            ,
            t.prototype.refresh = function() {
                return this._supportElementsByClassName ? (this._targets = this._wrapper.getElementsByClassName(this.options.targetClass),
                this.refresh = function() {
                    return this
                }
                ) : this.refresh = function() {
                    var e = this._wrapper.querySelectorAll("." + this.options.targetClass);
                    this._targets = [];
                    for (var t = 0; t < e.length; t++)
                        this._targets.push(e[t]);
                    return this
                }
                ,
                this.refresh()
            }
            ,
            t.prototype.check = function() {
                var t = this
                  , n = arguments.length <= 0 ? undefined : arguments[0]
                  , r = arguments.length <= 1 ? undefined : arguments[1];
                return typeof n != "number" && (r = n,
                n = -1),
                typeof n == "undefined" && (n = -1),
                typeof r == "undefined" && (r = !1),
                clearTimeout(this._timer),
                n < 0 ? this._check(r) : this._timer = setTimeout(function() {
                    t._check(r),
                    t._timer = null
                }, n),
                this
            }
            ,
            t.prototype._getWrapperRect = function() {
                return this._wrapper.getBoundingClientRect()
            }
            ,
            t._getWindowRect = function() {
                return {
                    top: 0,
                    left: 0,
                    bottom: document.documentElement.clientHeight || document.body.clientHeight,
                    right: document.documentElement.clientWidth || document.body.clientWidth
                }
            }
            ,
            t.prototype._reviseElements = function() {
                var n = this;
                return this._supportElementsByClassName ? this._reviseElements = function() {
                    return !0
                }
                : this._reviseElements = function(e, r) {
                    return t._hasClass(e, n.options.targetClass) ? !0 : (e.__VISIBLE__ = null,
                    n._targets.splice(r, 1),
                    !1)
                }
                ,
                this._reviseElements.apply(this, arguments)
            }
            ,
            t.prototype._check = function(t) {
                var n = parseInt(this.options.expandSize, 10)
                  , r = []
                  , i = []
                  , s = void 0
                  , o = void 0
                  , u = void 0
                  , a = void 0
                  , f = void 0
                  , l = this._getAreaRect()
                  , c = {
                    top: l.top - n,
                    left: l.left - n,
                    bottom: l.bottom + n,
                    right: l.right + n
                };
                for (s = this._targets.length - 1; o = this._targets[s]; s--) {
                    u = o.getBoundingClientRect();
                    if (u.width === 0 && u.height === 0)
                        continue;
                    this._reviseElements(o, s) && (a = !!o.__VISIBLE__,
                    t ? (f = !(u.top < c.top || u.bottom > c.bottom || u.right > c.right || u.left < c.left),
                    o.__VISIBLE__ = f) : (f = !(u.bottom < c.top || c.bottom < u.top || u.right < c.left || c.right < u.left),
                    o.__VISIBLE__ = f),
                    a !== f && (f ? r.unshift(o) : i.unshift(o)))
                }
                this.trigger("change", {
                    visible: r,
                    invisible: i
                })
            }
            ,
            t.prototype.destroy = function() {
                this.off(),
                this._targets = [],
                this._wrapper = null,
                this._timer = null
            }
            ,
            t
        }(o["default"]);
        c.VERSION = "2.0.0",
        t["default"] = c,
        e.exports = t["default"]
    }
    , function(t, n) {
        t.exports = e
    }
    ])
});
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n(require("hammerjs"), require("@egjs/component")) : typeof define == "function" && define.amd ? define(["hammerjs", "@egjs/component"], n) : typeof exports == "object" ? exports.Axes = n(require("hammerjs"), require("@egjs/component")) : (t.eg = t.eg || {},
    t.eg.Axes = n(t.Hammer, t.eg.Component))
}
)(this, function(e, t) {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.l = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.d = function(e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        }
        ,
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e["default"]
            }
            : function() {
                return e
            }
            ;
            return n.d(t, "a", t),
            t
        }
        ,
        n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        n.p = "",
        n(n.s = 6)
    }([function(e, t, n) {
        "use strict";
        function r(e, t) {
            t === void 0 && (t = !1);
            var n;
            if (typeof e == "string") {
                var i = e.match(/^<([a-z]+)\s*([^>]*)>/);
                if (i) {
                    var s = document.createElement("div");
                    s.innerHTML = e,
                    n = Array.prototype.slice.call(s.childNodes)
                } else
                    n = Array.prototype.slice.call(document.querySelectorAll(e));
                t || (n = n.length >= 1 ? n[0] : undefined)
            } else
                e === window ? n = e : !e.nodeName || e.nodeType !== 1 && e.nodeType !== 9 ? "jQuery"in window && e instanceof jQuery || e.constructor.prototype.jquery ? n = t ? e.toArray() : e.get(0) : Array.isArray(e) && (n = e.map(function(e) {
                    return r(e)
                }),
                t || (n = n.length >= 1 ? n[0] : undefined)) : n = e;
            return n
        }
        function a(e) {
            return i(e)
        }
        function f(e) {
            s(e)
        }
        t.__esModule = !0,
        t.$ = r;
        var i = window.requestAnimationFrame || window.webkitRequestAnimationFrame
          , s = window.cancelAnimationFrame || window.webkitCancelAnimationFrame;
        if (i && !s) {
            var o = {}
              , u = i;
            i = function(e) {
                function t(t) {
                    o[n] && e(t)
                }
                var n = u(t);
                return o[n] = !0,
                n
            }
            ,
            s = function(e) {
                delete o[e]
            }
        } else if (!i || !s)
            i = function(e) {
                return window.setTimeout(function() {
                    e(window.performance && window.performance.now())
                }, 16)
            }
            ,
            s = window.clearTimeout;
        t.requestAnimationFrame = a,
        t.cancelAnimationFrame = f
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = {
            getInsidePosition: function(e, t, n, r) {
                var i = e
                  , s = [n[0] ? t[0] : r ? t[0] - r[0] : t[0], n[1] ? t[1] : r ? t[1] + r[1] : t[1]];
                return i = Math.max(s[0], i),
                i = Math.min(s[1], i),
                +Math.min(s[1], Math.max(s[0], i)).toFixed(5)
            },
            isOutside: function(e, t) {
                return e < t[0] || e > t[1]
            },
            getDuration: function(e, t) {
                var n = Math.sqrt(e / t * 2);
                return n < 100 ? 0 : n
            },
            isCircularable: function(e, t, n) {
                return n[1] && e > t[1] || n[0] && e < t[0]
            },
            getCirculatedPos: function(e, t, n) {
                var r = e
                  , i = t[0]
                  , s = t[1]
                  , o = s - i;
                return n[1] && e > s && (r = (r - s) % o + i),
                n[0] && e < i && (r = (r - i) % o + s),
                +r.toFixed(5)
            }
        };
        t["default"] = r
    }
    , function(e, t, n) {
        "use strict";
        var r = this && this.__assign || Object.assign || function(e) {
            for (var t, n = 1, r = arguments.length; n < r; n++) {
                t = arguments[n];
                for (var i in t)
                    Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i])
            }
            return e
        }
        ;
        t.__esModule = !0;
        var i = n(1)
          , s = function() {
            function e(e, t) {
                var n = this;
                this.axis = e,
                this.options = t,
                this._pos = Object.keys(this.axis).reduce(function(e, t) {
                    return e[t] = n.axis[t].range[0],
                    e
                }, {})
            }
            return e.equal = function(e, t) {
                for (var n in e)
                    if (e[n] !== t[n])
                        return !1;
                return !0
            }
            ,
            e.prototype.getDelta = function(e, t) {
                var n = this.get(e);
                return this.map(this.get(t), function(e, t) {
                    return e - n[t]
                })
            }
            ,
            e.prototype.get = function(e) {
                var t = this;
                return e && Array.isArray(e) ? e.reduce(function(e, n) {
                    return n && n in t._pos && (e[n] = t._pos[n]),
                    e
                }, {}) : r({}, this._pos, e || {})
            }
            ,
            e.prototype.moveTo = function(e) {
                var t = this
                  , n = this.map(this._pos, function(n, r) {
                    return e[r] ? e[r] - t._pos[r] : 0
                });
                return this.set(e),
                {
                    pos: r({}, this._pos),
                    delta: n
                }
            }
            ,
            e.prototype.set = function(e) {
                for (var t in e)
                    t && t in this._pos && (this._pos[t] = e[t])
            }
            ,
            e.prototype.every = function(e, t) {
                var n = this.axis;
                for (var r in e)
                    if (r && !t(e[r], r, n[r]))
                        return !1;
                return !0
            }
            ,
            e.prototype.filter = function(e, t) {
                var n = {}
                  , r = this.axis;
                for (var i in e)
                    i && t(e[i], i, r[i]) && (n[i] = e[i]);
                return n
            }
            ,
            e.prototype.map = function(e, t) {
                var n = {}
                  , r = this.axis;
                for (var i in e)
                    i && (n[i] = t(e[i], i, r[i]));
                return n
            }
            ,
            e.prototype.isOutside = function(e) {
                return !this.every(e ? this.get(e) : this._pos, function(e, t, n) {
                    return !i["default"].isOutside(e, n.range)
                })
            }
            ,
            e
        }();
        t.AxisManager = s
    }
    , function(t, n) {
        t.exports = e
    }
    , function(e, t, n) {
        "use strict";
        function i(e, t) {
            return t.reduce(function(t, n, r) {
                return e[r] && (t[e[r]] = n),
                t
            }, {})
        }
        function s(e, t, n) {
            try {
                var i = {
                    recognizers: [t],
                    cssProps: {
                        userSelect: "none",
                        touchSelect: "none",
                        touchCallout: "none",
                        userDrag: "none"
                    }
                };
                return n && (i.inputClass = n),
                new r.Manager(e,i)
            } catch (s) {
                return null
            }
        }
        function o(e) {
            e === void 0 && (e = []);
            var n = !1
              , i = !1;
            return e.forEach(function(e) {
                switch (e) {
                case "mouse":
                    i = !0;
                    break;
                case "touch":
                    n = t.SUPPORT_TOUCH
                }
            }),
            n && r.TouchInput || i && r.MouseInput || null
        }
        t.__esModule = !0;
        var r = n(3);
        t.SUPPORT_TOUCH = "ontouchstart"in window,
        t.UNIQUEKEY = "_EGJS_AXES_INPUTTYPE_",
        t.toAxis = i,
        t.createHammer = s,
        t.convertInputType = o
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r;
        (function(e) {
            e[e.DIRECTION_NONE = 1] = "DIRECTION_NONE",
            e[e.DIRECTION_LEFT = 2] = "DIRECTION_LEFT",
            e[e.DIRECTION_RIGHT = 4] = "DIRECTION_RIGHT",
            e[e.DIRECTION_HORIZONTAL = 6] = "DIRECTION_HORIZONTAL",
            e[e.DIRECTION_UP = 8] = "DIRECTION_UP",
            e[e.DIRECTION_DOWN = 16] = "DIRECTION_DOWN",
            e[e.DIRECTION_VERTICAL = 24] = "DIRECTION_VERTICAL",
            e[e.DIRECTION_ALL = 30] = "DIRECTION_ALL"
        }
        )(r = t.DIRECTION || (t.DIRECTION = {})),
        t.TRANSFORM = function() {
            var e = (document.head || document.getElementsByTagName("head")[0]).style
              , t = ["transform", "webkitTransform", "msTransform", "mozTransform"];
            for (var n = 0, r = t.length; n < r; n++)
                if (t[n]in e)
                    return t[n];
            return ""
        }()
    }
    , function(e, t, n) {
        "use strict";
        var r = n(7);
        e.exports = r["default"]
    }
    , function(e, t, n) {
        "use strict";
        var r = this && this.__extends || function() {
            var e = Object.setPrototypeOf || {
                __proto__: []
            }instanceof Array && function(e, t) {
                e.__proto__ = t
            }
            || function(e, t) {
                for (var n in t)
                    t.hasOwnProperty(n) && (e[n] = t[n])
            }
            ;
            return function(t, n) {
                function r() {
                    this.constructor = t
                }
                e(t, n),
                t.prototype = n === null ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , i = this && this.__assign || Object.assign || function(e) {
            for (var t, n = 1, r = arguments.length; n < r; n++) {
                t = arguments[n];
                for (var i in t)
                    Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i])
            }
            return e
        }
        ;
        t.__esModule = !0;
        var s = n(8)
          , o = n(9)
          , u = n(10)
          , a = n(11)
          , f = n(2)
          , l = n(12)
          , c = n(13)
          , h = n(14)
          , p = n(15)
          , d = n(5)
          , v = function(e) {
            function t(t, n, r) {
                t === void 0 && (t = {});
                var s = e.call(this) || this;
                return s.axis = t,
                s._inputs = [],
                s.options = i({
                    easing: function(t) {
                        return 1 - Math.pow(1 - t, 3)
                    },
                    interruptable: !0,
                    maximumDuration: Infinity,
                    minimumDuration: 0,
                    deceleration: 6e-4
                }, n),
                s._complementOptions(),
                s._axm = new f.AxisManager(s.axis,s.options),
                s._em = new u.EventManager(s,s._axm),
                s._itm = new a.InterruptManager(s.options),
                s._am = new o.AnimationManager(s.options,s._itm,s._em,s._axm),
                s._io = new l.InputObserver(s.options,s._itm,s._em,s._axm,s._am),
                r && setTimeout(function() {
                    return s._em.triggerChange(r)
                }, 0),
                s
            }
            return r(t, e),
            t.prototype._complementOptions = function() {
                var e = this;
                Object.keys(this.axis).forEach(function(t) {
                    e.axis[t] = i({
                        range: [0, 100],
                        bounce: [0, 0],
                        circular: [!1, !1]
                    }, e.axis[t]),
                    ["bounce", "circular"].forEach(function(n) {
                        var r = e.axis
                          , i = r[t][n];
                        /string|number|boolean/.test(typeof i) && (r[t][n] = [i, i])
                    })
                })
            }
            ,
            t.prototype.connect = function(e, t) {
                var n;
                typeof e == "string" ? n = e.split(" ") : n = e.concat(),
                ~this._inputs.indexOf(t) && this.disconnect(t);
                if ("hammer"in t) {
                    var r = this._inputs.filter(function(e) {
                        return e.hammer && e.element === t.element
                    });
                    r.length && (t.hammer = r[0].hammer)
                }
                return t.mapAxes(n),
                t.connect(this._io),
                this._inputs.push(t),
                this
            }
            ,
            t.prototype.disconnect = function(e) {
                if (e) {
                    var t = this._inputs.indexOf(e);
                    this._inputs[t].disconnect(),
                    ~t && this._inputs.splice(t, 1)
                } else
                    this._inputs.forEach(function(e) {
                        return e.disconnect()
                    }),
                    this._inputs = [];
                return this
            }
            ,
            t.prototype.get = function(e) {
                return this._axm.get(e)
            }
            ,
            t.prototype.setTo = function(e, t) {
                return t === void 0 && (t = 0),
                this._am.setTo(e, t),
                this
            }
            ,
            t.prototype.setBy = function(e, t) {
                return t === void 0 && (t = 0),
                this._am.setBy(e, t),
                this
            }
            ,
            t.prototype.isBounceArea = function(e) {
                return this._axm.isOutside(e)
            }
            ,
            t.prototype.destroy = function() {
                this.disconnect(),
                this._em.destroy()
            }
            ,
            t.VERSION = "#__VERSION__#",
            t.PanInput = c.PanInput,
            t.PinchInput = h.PinchInput,
            t.WheelInput = p.WheelInput,
            t.TRANSFORM = d.TRANSFORM,
            t.DIRECTION_NONE = d.DIRECTION.DIRECTION_NONE,
            t.DIRECTION_LEFT = d.DIRECTION.DIRECTION_LEFT,
            t.DIRECTION_RIGHT = d.DIRECTION.DIRECTION_RIGHT,
            t.DIRECTION_UP = d.DIRECTION.DIRECTION_UP,
            t.DIRECTION_DOWN = d.DIRECTION.DIRECTION_DOWN,
            t.DIRECTION_HORIZONTAL = d.DIRECTION.DIRECTION_HORIZONTAL,
            t.DIRECTION_VERTICAL = d.DIRECTION.DIRECTION_VERTICAL,
            t.DIRECTION_ALL = d.DIRECTION.DIRECTION_ALL,
            t
        }(s);
        t["default"] = v
    }
    , function(e, n) {
        e.exports = t
    }
    , function(e, t, n) {
        "use strict";
        var r = this && this.__assign || Object.assign || function(e) {
            for (var t, n = 1, r = arguments.length; n < r; n++) {
                t = arguments[n];
                for (var i in t)
                    Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i])
            }
            return e
        }
        ;
        t.__esModule = !0;
        var i = n(1)
          , s = n(2)
          , o = n(0)
          , u = function() {
            function e(e, t, n, r) {
                this.options = e,
                this.itm = t,
                this.em = n,
                this.axm = r,
                this.animationEnd = this.animationEnd.bind(this)
            }
            return e.getDuration = function(e, t, n) {
                return Math.max(Math.min(e, n), t)
            }
            ,
            e.prototype.getDuration = function(t, n, r) {
                var s = this, o;
                if (typeof r != "undefined")
                    o = r;
                else {
                    var u = this.axm.map(n, function(e, n) {
                        return i["default"].getDuration(Math.abs(Math.abs(e) - Math.abs(t[n])), s.options.deceleration)
                    });
                    o = Object.keys(u).reduce(function(e, t) {
                        return Math.max(e, u[t])
                    }, -Infinity)
                }
                return e.getDuration(o, this.options.minimumDuration, this.options.maximumDuration)
            }
            ,
            e.prototype.createAnimationParam = function(t, n, r) {
                r === void 0 && (r = null);
                var s = this.axm.get()
                  , o = this.axm.get(this.axm.map(t, function(e, t, n) {
                    return i["default"].getInsidePosition(e, n.range, n.circular, n.bounce)
                }));
                return {
                    depaPos: s,
                    destPos: o,
                    duration: e.getDuration(n, this.options.minimumDuration, this.options.maximumDuration),
                    delta: this.axm.getDelta(s, o),
                    inputEvent: r,
                    done: this.animationEnd
                }
            }
            ,
            e.prototype.grab = function(e, t, n) {
                if (this._animateParam && !e.length) {
                    var r = this.axm.get(e)
                      , s = this.axm.map(r, function(e, t, n) {
                        return i["default"].getCirculatedPos(e, n.range, n.circular)
                    });
                    this.axm.every(s, function(e, t) {
                        return r[t] === e
                    }) || this.em.triggerChange(s, t, n),
                    this._animateParam = null,
                    this._raf && o.cancelAnimationFrame(this._raf),
                    this._raf = null,
                    this.em.triggerAnimationEnd()
                }
            }
            ,
            e.prototype.restore = function(e) {
                e === void 0 && (e = null);
                var t = this.axm.get()
                  , n = this.axm.map(t, function(e, t, n) {
                    return Math.min(n.range[1], Math.max(n.range[0], e))
                });
                this.animateTo(n, this.getDuration(t, n), e)
            }
            ,
            e.prototype.animationEnd = function() {
                this._animateParam = null;
                var e = this.axm.filter(this.axm.get(), function(e, t, n) {
                    return i["default"].isCircularable(e, n.range, n.circular)
                });
                Object.keys(e).length > 0 && this.setTo(this.axm.map(e, function(e, t, n) {
                    return i["default"].getCirculatedPos(e, n.range, n.circular)
                })),
                this.itm.setInterrupt(!1),
                this.em.triggerAnimationEnd(),
                this.axm.isOutside() && this.restore()
            }
            ,
            e.prototype.animateLoop = function(e, t) {
                this._animateParam = r({}, e),
                this._animateParam.startTime = (new Date).getTime();
                if (e.duration) {
                    var n = this._animateParam
                      , i = this;
                    (function u() {
                        i._raf = null;
                        if (i.frame(n) >= 1) {
                            s.AxisManager.equal(e.destPos, i.axm.get(Object.keys(e.destPos))) || i.em.triggerChange(e.destPos),
                            t();
                            return
                        }
                        i._raf = o.requestAnimationFrame(u)
                    }
                    )()
                } else
                    this.em.triggerChange(e.destPos),
                    t()
            }
            ,
            e.prototype.getUserControll = function(t) {
                var n = t.setTo();
                return n.destPos = this.axm.get(n.destPos),
                n.duration = e.getDuration(n.duration, this.options.minimumDuration, this.options.maximumDuration),
                n
            }
            ,
            e.prototype.animateTo = function(e, t, n) {
                var o = this;
                n === void 0 && (n = null);
                var u = this.createAnimationParam(e, t, n)
                  , a = r({}, u.depaPos)
                  , f = this.em.triggerAnimationStart(u)
                  , l = this.getUserControll(u);
                !f && this.axm.every(l.destPos, function(e, t, n) {
                    return i["default"].isCircularable(e, n.range, n.circular)
                }) && console.warn("You can't stop the 'animation' event when 'circular' is true."),
                f && !s.AxisManager.equal(l.destPos, a) && this.animateLoop({
                    depaPos: a,
                    destPos: l.destPos,
                    duration: l.duration,
                    delta: this.axm.getDelta(a, l.destPos)
                }, function() {
                    return o.animationEnd()
                })
            }
            ,
            e.prototype.frame = function(e) {
                var t = (new Date).getTime() - e.startTime
                  , n = this.easing(t / e.duration)
                  , r = e.depaPos;
                return r = this.axm.map(r, function(t, r, s) {
                    return t += (e.destPos[r] - t) * n,
                    i["default"].getCirculatedPos(t, s.range, s.circular)
                }),
                this.em.triggerChange(r),
                n
            }
            ,
            e.prototype.easing = function(e) {
                return e > 1 ? 1 : this.options.easing(e)
            }
            ,
            e.prototype.setTo = function(e, t) {
                t === void 0 && (t = 0);
                var n = Object.keys(e);
                this.grab(n);
                var r = this.axm.get(n);
                if (s.AxisManager.equal(e, r))
                    return this;
                this.itm.setInterrupt(!0);
                var o = this.axm.filter(e, function(e, t) {
                    return r[t] !== e
                });
                if (!Object.keys(o).length)
                    return;
                return o = this.axm.map(o, function(e, n, r) {
                    return e = i["default"].getInsidePosition(e, r.range, r.circular),
                    t ? e : i["default"].getCirculatedPos(e, r.range, r.circular)
                }),
                s.AxisManager.equal(o, r) ? this : (t ? this.animateTo(o, t) : (this.em.triggerChange(o),
                this.itm.setInterrupt(!1)),
                this)
            }
            ,
            e.prototype.setBy = function(e, t) {
                return t === void 0 && (t = 0),
                this.setTo(this.axm.map(this.axm.get(Object.keys(e)), function(t, n) {
                    return t + e[n]
                }), t)
            }
            ,
            e
        }();
        t.AnimationManager = u
    }
    , function(e, t, n) {
        "use strict";
        var r = this && this.__assign || Object.assign || function(e) {
            for (var t, n = 1, r = arguments.length; n < r; n++) {
                t = arguments[n];
                for (var i in t)
                    Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i])
            }
            return e
        }
        ;
        t.__esModule = !0;
        var i = function() {
            function e(e, t) {
                this.axes = e,
                this.axm = t
            }
            return e.prototype.triggerHold = function(e, t, n) {
                this.axes.trigger("hold", {
                    pos: e,
                    input: t,
                    inputEvent: n
                })
            }
            ,
            e.prototype.triggerRelease = function(e) {
                e.setTo = this.createUserControll(e.destPos, e.duration),
                this.axes.trigger("release", e)
            }
            ,
            e.prototype.triggerChange = function(e, t, n) {
                t === void 0 && (t = null),
                n === void 0 && (n = null);
                var r = this.axm.moveTo(e)
                  , i = {
                    pos: r.pos,
                    delta: r.delta,
                    holding: !!n,
                    inputEvent: n,
                    input: t,
                    set: n ? this.createUserControll(r.pos) : function() {}
                };
                this.axes.trigger("change", i),
                n && this.axm.set(i.set().destPos)
            }
            ,
            e.prototype.triggerAnimationStart = function(e) {
                return e.setTo = this.createUserControll(e.destPos, e.duration),
                this.axes.trigger("animationStart", e)
            }
            ,
            e.prototype.triggerAnimationEnd = function() {
                this.axes.trigger("animationEnd")
            }
            ,
            e.prototype.createUserControll = function(e, t) {
                t === void 0 && (t = 0);
                var n = {
                    destPos: r({}, e),
                    duration: t
                };
                return function(e, t) {
                    return e && (n.destPos = r({}, e)),
                    t !== undefined && (n.duration = t),
                    n
                }
            }
            ,
            e.prototype.destroy = function() {
                this.axes.off()
            }
            ,
            e
        }();
        t.EventManager = i
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = function() {
            function e(e) {
                this.options = e,
                this._prevented = !1
            }
            return e.prototype.isInterrupting = function() {
                return this.options.interruptable || this._prevented
            }
            ,
            e.prototype.isInterrupted = function() {
                return !this.options.interruptable && this._prevented
            }
            ,
            e.prototype.setInterrupt = function(e) {
                !this.options.interruptable && (this._prevented = e)
            }
            ,
            e
        }();
        t.InterruptManager = r
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = n(2)
          , i = n(1)
          , s = function() {
            function e(e, t, n, r, i) {
                this.options = e,
                this.itm = t,
                this.em = n,
                this.axm = r,
                this.am = i,
                this.isOutside = !1,
                this.moveDistance = null
            }
            return e.prototype.atOutside = function(e) {
                var t = this;
                if (this.isOutside)
                    return this.axm.map(e, function(e, t, n) {
                        var r = n.range[0] - n.bounce[0]
                          , i = n.range[1] + n.bounce[1];
                        return e > i ? i : e < r ? r : e
                    });
                var n = this.am.easing(1e-5) / 1e-5;
                return this.axm.map(e, function(e, r, i) {
                    var s = i.range[0]
                      , o = i.range[1]
                      , u = i.bounce;
                    return e < s ? s - t.am.easing((s - e) / (u[0] * n)) * u[0] : e > o ? o + t.am.easing((e - o) / (u[1] * n)) * u[1] : e
                })
            }
            ,
            e.prototype.get = function(e) {
                return this.axm.get(e.axes)
            }
            ,
            e.prototype.hold = function(e, t) {
                if (this.itm.isInterrupted() || !e.axes.length)
                    return;
                this.itm.setInterrupt(!0),
                this.am.grab(e.axes, e, t),
                this.moveDistance || this.em.triggerHold(this.axm.get(), e, t),
                this.isOutside = this.axm.isOutside(e.axes),
                this.moveDistance = this.axm.get(e.axes)
            }
            ,
            e.prototype.change = function(e, t, n) {
                if (!this.itm.isInterrupting() || this.axm.every(n, function(e) {
                    return e === 0
                }))
                    return;
                var r = this.axm.get(e.axes), s;
                s = this.axm.map(this.moveDistance || r, function(e, t) {
                    return e + (n[t] || 0)
                }),
                this.moveDistance && (this.moveDistance = s),
                s = this.axm.map(s, function(e, t, n) {
                    return i["default"].getCirculatedPos(e, n.range, n.circular)
                }),
                this.isOutside && this.axm.every(r, function(e, t, n) {
                    return !i["default"].isOutside(e, n.range)
                }) && (this.isOutside = !1),
                s = this.atOutside(s),
                this.em.triggerChange(s, e, t)
            }
            ,
            e.prototype.release = function(e, t, n, s) {
                if (!this.itm.isInterrupting())
                    return;
                if (!this.moveDistance)
                    return;
                var o = this.axm.get(e.axes)
                  , u = this.axm.get()
                  , a = this.axm.get(this.axm.map(n, function(e, t, n) {
                    return i["default"].getInsidePosition(o[t] + e, n.range, n.circular, n.bounce)
                }))
                  , f = {
                    depaPos: u,
                    destPos: a,
                    duration: this.am.getDuration(a, o, s),
                    delta: this.axm.getDelta(u, a),
                    inputEvent: t,
                    input: e
                };
                this.em.triggerRelease(f),
                this.moveDistance = null;
                var l = this.am.getUserControll(f)
                  , c = r.AxisManager.equal(l.destPos, u);
                c || l.duration === 0 ? (!c && this.em.triggerChange(l.destPos, e, t),
                this.itm.setInterrupt(!1),
                this.axm.isOutside() && this.am.restore(t)) : this.am.animateTo(l.destPos, l.duration, t)
            }
            ,
            e
        }();
        t.InputObserver = s
    }
    , function(e, t, n) {
        "use strict";
        var r = this && this.__assign || Object.assign || function(e) {
            for (var t, n = 1, r = arguments.length; n < r; n++) {
                t = arguments[n];
                for (var i in t)
                    Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i])
            }
            return e
        }
        ;
        t.__esModule = !0;
        var i = n(3)
          , s = n(5)
          , o = n(0)
          , u = n(4)
          , a = function() {
            function e(e, t) {
                this.axes = [],
                this.hammer = null,
                this.element = null;
                if (typeof i == "undefined")
                    throw new Error("The Hammerjs must be loaded before eg.Axes.PanInput.\nhttp://hammerjs.github.io/");
                this.element = o.$(e),
                this.options = r({
                    inputType: ["touch", "mouse"],
                    scale: [1, 1],
                    thresholdAngle: 45,
                    threshold: 0
                }, t),
                this.onHammerInput = this.onHammerInput.bind(this),
                this.onPanmove = this.onPanmove.bind(this),
                this.onPanend = this.onPanend.bind(this)
            }
            return e.getDirectionByAngle = function(e, t) {
                if (t < 0 || t > 90)
                    return s.DIRECTION.DIRECTION_NONE;
                var n = Math.abs(e);
                return n > t && n < 180 - t ? s.DIRECTION.DIRECTION_VERTICAL : s.DIRECTION.DIRECTION_HORIZONTAL
            }
            ,
            e.getNextOffset = function(e, t) {
                var n = Math.sqrt(e[0] * e[0] + e[1] * e[1])
                  , r = Math.abs(n / -t);
                return [e[0] / 2 * r, e[1] / 2 * r]
            }
            ,
            e.useDirection = function(e, t, n) {
                return n ? !!(t === s.DIRECTION.DIRECTION_ALL || t & e && n & e) : !!(t & e)
            }
            ,
            e.prototype.mapAxes = function(e) {
                var t = !!e[0]
                  , n = !!e[1];
                t && n ? this._direction = s.DIRECTION.DIRECTION_ALL : t ? this._direction = s.DIRECTION.DIRECTION_HORIZONTAL : n ? this._direction = s.DIRECTION.DIRECTION_VERTICAL : this._direction = s.DIRECTION.DIRECTION_NONE,
                this.axes = e
            }
            ,
            e.prototype.connect = function(e) {
                var t = {
                    direction: this._direction,
                    threshold: this.options.threshold
                };
                if (this.hammer)
                    this.dettachEvent(),
                    this.hammer.add(new i.Pan(t));
                else {
                    var n = this.element[u.UNIQUEKEY];
                    n ? this.hammer.destroy() : n = String(Math.round(Math.random() * (new Date).getTime()));
                    var r = u.convertInputType(this.options.inputType);
                    if (!r)
                        throw new Error("Wrong inputType parameter!");
                    this.hammer = u.createHammer(this.element, [i.Pan, t], r),
                    this.element[u.UNIQUEKEY] = n
                }
                return this.attachEvent(e),
                this
            }
            ,
            e.prototype.disconnect = function() {
                return this.hammer && this.dettachEvent(),
                this._direction = s.DIRECTION.DIRECTION_NONE,
                this
            }
            ,
            e.prototype.destroy = function() {
                this.disconnect(),
                this.hammer && this.hammer.destroy(),
                delete this.element[u.UNIQUEKEY],
                this.element = null,
                this.hammer = null
            }
            ,
            e.prototype.enable = function() {
                return this.hammer && (this.hammer.get("pan").options.enable = !0),
                this
            }
            ,
            e.prototype.disable = function() {
                return this.hammer && (this.hammer.get("pan").options.enable = !1),
                this
            }
            ,
            e.prototype.isEnable = function() {
                return !!this.hammer && !!this.hammer.get("pan").options.enable
            }
            ,
            e.prototype.onHammerInput = function(e) {
                this.isEnable() && (e.isFirst ? this.observer.hold(this, e) : e.isFinal && this.onPanend(e))
            }
            ,
            e.prototype.onPanmove = function(t) {
                var n = e.getDirectionByAngle(t.angle, this.options.thresholdAngle)
                  , r = this.hammer.session.prevInput;
                r ? (t.offsetX = t.deltaX - r.deltaX,
                t.offsetY = t.deltaY - r.deltaY) : (t.offsetX = 0,
                t.offsetY = 0);
                var i = this.getOffset([t.offsetX, t.offsetY], [e.useDirection(s.DIRECTION.DIRECTION_HORIZONTAL, this._direction, n), e.useDirection(s.DIRECTION.DIRECTION_VERTICAL, this._direction, n)])
                  , o = i.some(function(e) {
                    return e !== 0
                });
                o && (t.srcEvent.preventDefault(),
                t.srcEvent.stopPropagation()),
                t.preventSystemEvent = o,
                o && this.observer.change(this, t, u.toAxis(this.axes, i))
            }
            ,
            e.prototype.onPanend = function(t) {
                var n = this.getOffset([Math.abs(t.velocityX) * (t.deltaX < 0 ? -1 : 1), Math.abs(t.velocityY) * (t.deltaY < 0 ? -1 : 1)], [e.useDirection(s.DIRECTION.DIRECTION_HORIZONTAL, this._direction), e.useDirection(s.DIRECTION.DIRECTION_VERTICAL, this._direction)]);
                n = e.getNextOffset(n, this.observer.options.deceleration),
                this.observer.release(this, t, u.toAxis(this.axes, n))
            }
            ,
            e.prototype.attachEvent = function(e) {
                this.observer = e,
                this.hammer.on("hammer.input", this.onHammerInput).on("panstart panmove", this.onPanmove)
            }
            ,
            e.prototype.dettachEvent = function() {
                this.hammer.off("hammer.input", this.onHammerInput).off("panstart panmove", this.onPanmove),
                this.observer = null
            }
            ,
            e.prototype.getOffset = function(e, t) {
                var n = [0, 0]
                  , r = this.options.scale;
                return t[0] && (n[0] = e[0] * r[0]),
                t[1] && (n[1] = e[1] * r[1]),
                n
            }
            ,
            e
        }();
        t.PanInput = a
    }
    , function(e, t, n) {
        "use strict";
        var r = this && this.__assign || Object.assign || function(e) {
            for (var t, n = 1, r = arguments.length; n < r; n++) {
                t = arguments[n];
                for (var i in t)
                    Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i])
            }
            return e
        }
        ;
        t.__esModule = !0;
        var i = n(3)
          , s = n(0)
          , o = n(4)
          , u = function() {
            function e(e, t) {
                this.axes = [],
                this.hammer = null,
                this.element = null,
                this._base = null,
                this._prev = null;
                if (typeof i == "undefined")
                    throw new Error("The Hammerjs must be loaded before eg.Axes.PinchInput.\nhttp://hammerjs.github.io/");
                this.element = s.$(e),
                this.options = r({
                    scale: 1,
                    threshold: 0
                }, t),
                this.onPinchStart = this.onPinchStart.bind(this),
                this.onPinchMove = this.onPinchMove.bind(this),
                this.onPinchEnd = this.onPinchEnd.bind(this)
            }
            return e.prototype.mapAxes = function(e) {
                this.axes = e
            }
            ,
            e.prototype.connect = function(e) {
                var t = {
                    threshold: this.options.threshold
                };
                if (this.hammer)
                    this.dettachEvent(),
                    this.hammer.add(new i.Pinch(t));
                else {
                    var n = this.element[o.UNIQUEKEY];
                    n ? this.hammer.destroy() : n = String(Math.round(Math.random() * (new Date).getTime())),
                    this.hammer = o.createHammer(this.element, [i.Pinch, t], i.TouchInput),
                    this.element[o.UNIQUEKEY] = n
                }
                return this.attachEvent(e),
                this
            }
            ,
            e.prototype.disconnect = function() {
                return this.hammer && this.dettachEvent(),
                this
            }
            ,
            e.prototype.destroy = function() {
                this.disconnect(),
                this.hammer && this.hammer.destroy(),
                delete this.element[o.UNIQUEKEY],
                this.element = null,
                this.hammer = null
            }
            ,
            e.prototype.onPinchStart = function(e) {
                this._base = this.observer.get(this)[this.axes[0]];
                var t = this.getOffset(e.scale);
                this.observer.hold(this, e),
                this.observer.change(this, e, o.toAxis(this.axes, [t])),
                this._prev = e.scale
            }
            ,
            e.prototype.onPinchMove = function(e) {
                var t = this.getOffset(e.scale, this._prev);
                this.observer.change(this, e, o.toAxis(this.axes, [t])),
                this._prev = e.scale
            }
            ,
            e.prototype.onPinchEnd = function(e) {
                var t = this.getOffset(e.scale, this._prev);
                this.observer.change(this, e, o.toAxis(this.axes, [t])),
                this.observer.release(this, e, o.toAxis(this.axes, [0]), 0),
                this._base = null,
                this._prev = null
            }
            ,
            e.prototype.getOffset = function(e, t) {
                return t === void 0 && (t = 1),
                this._base * (e - t) * this.options.scale
            }
            ,
            e.prototype.attachEvent = function(e) {
                this.observer = e,
                this.hammer.on("pinchstart", this.onPinchStart).on("pinchmove", this.onPinchMove).on("pinchend", this.onPinchEnd)
            }
            ,
            e.prototype.dettachEvent = function() {
                this.hammer.off("pinchstart", this.onPinchStart).off("pinchmove", this.onPinchMove).off("pinchend", this.onPinchEnd),
                this.observer = null,
                this._prev = null
            }
            ,
            e.prototype.enable = function() {
                return this.hammer && (this.hammer.get("pinch").options.enable = !0),
                this
            }
            ,
            e.prototype.disable = function() {
                return this.hammer && (this.hammer.get("pinch").options.enable = !1),
                this
            }
            ,
            e.prototype.isEnable = function() {
                return !!this.hammer && !!this.hammer.get("pinch").options.enable
            }
            ,
            e
        }();
        t.PinchInput = u
    }
    , function(e, t, n) {
        "use strict";
        var r = this && this.__assign || Object.assign || function(e) {
            for (var t, n = 1, r = arguments.length; n < r; n++) {
                t = arguments[n];
                for (var i in t)
                    Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i])
            }
            return e
        }
        ;
        t.__esModule = !0;
        var i = n(0)
          , s = n(4)
          , o = function() {
            function e(e, t) {
                this.axes = [],
                this.element = null,
                this._isEnabled = !1,
                this._timer = null,
                this.element = i.$(e),
                this.options = r({
                    scale: 1,
                    throttle: 100
                }, t),
                this.onWheel = this.onWheel.bind(this)
            }
            return e.prototype.mapAxes = function(e) {
                this.axes = e
            }
            ,
            e.prototype.connect = function(e) {
                return this.dettachEvent(),
                this.attachEvent(e),
                this
            }
            ,
            e.prototype.disconnect = function() {
                return this.dettachEvent(),
                this
            }
            ,
            e.prototype.destroy = function() {
                this.disconnect(),
                this.element = null
            }
            ,
            e.prototype.onWheel = function(e) {
                var t = this;
                if (!this._isEnabled)
                    return;
                e.preventDefault();
                if (e.deltaY === 0)
                    return;
                clearTimeout(this._timer),
                this._timer = setTimeout(function() {
                    t.observer.hold(t, e);
                    var n = (e.deltaY > 0 ? -1 : 1) * t.options.scale;
                    t.observer.change(t, e, s.toAxis(t.axes, [n])),
                    t.observer.release(t, e, s.toAxis(t.axes, [0]))
                }, 200)
            }
            ,
            e.prototype.attachEvent = function(e) {
                this.observer = e,
                this.element.addEventListener("wheel", this.onWheel),
                this._isEnabled = !0
            }
            ,
            e.prototype.dettachEvent = function() {
                this.element.removeEventListener("wheel", this.onWheel),
                this._isEnabled = !1,
                this.observer = null
            }
            ,
            e.prototype.enable = function() {
                return this._isEnabled = !0,
                this
            }
            ,
            e.prototype.disable = function() {
                return this._isEnabled = !1,
                this
            }
            ,
            e.prototype.isEnable = function() {
                return this._isEnabled
            }
            ,
            e
        }();
        t.WheelInput = o
    }
    ])
});
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n(require("@egjs/component"), require("@egjs/axes")) : typeof define == "function" && define.amd ? define("Flicking", ["@egjs/component", "@egjs/axes"], n) : typeof exports == "object" ? exports.Flicking = n(require("@egjs/component"), require("@egjs/axes")) : (t.eg = t.eg || {},
    t.eg.Flicking = n(t.eg.Component, t.eg.Axes))
}
)(this, function(e, t) {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.l = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.d = function(e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        }
        ,
        n.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e["default"]
            }
            : function() {
                return e
            }
            ;
            return n.d(t, "a", t),
            t
        }
        ,
        n.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        n.p = "",
        n(n.s = 2)
    }([function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = typeof window != "undefined" && window.Math === Math ? window : typeof self != "undefined" && (self.Math === Math ? self : Function("return this")())
          , i = r.document;
        t.window = r,
        t.document = i
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0,
        t.DATA_HEIGHT = t.IS_ANDROID2 = t.SUPPORT_WILLCHANGE = t.TRANSFORM = t.EVENTS = undefined;
        var r = n(0)
          , i = {
            beforeFlickStart: "beforeFlickStart",
            beforeRestore: "beforeRestore",
            flick: "flick",
            flickEnd: "flickEnd",
            restore: "restore"
        }
          , s = {
            name: "transform"
        };
        s.support = function() {
            var e = r.document.documentElement.style;
            return s.name in e || (s.name = "webkitTransform")in e
        }();
        var o = r.window.CSS && r.window.CSS.supports && r.window.CSS.supports("will-change", "transform")
          , u = /Android 2\./.test(navigator.userAgent)
          , a = "data-height";
        t.EVENTS = i,
        t.TRANSFORM = s,
        t.SUPPORT_WILLCHANGE = o,
        t.IS_ANDROID2 = u,
        t.DATA_HEIGHT = a
    }
    , function(e, t, n) {
        "use strict";
        function s(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        var r = n(3)
          , i = s(r);
        i["default"].VERSION = "2.0.3",
        e.exports = i["default"]
    }
    , function(e, t, n) {
        "use strict";
        function d(e) {
            if (e && e.__esModule)
                return e;
            var t = {};
            if (e != null)
                for (var n in e)
                    Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
            return t["default"] = e,
            t
        }
        function v(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        function m(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        function g(e, t) {
            if (!e)
                throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || typeof t != "object" && typeof t != "function" ? e : t
        }
        function y(e, t) {
            if (typeof t != "function" && t !== null)
                throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        t.__esModule = !0;
        var r = n(4)
          , i = v(r)
          , s = n(5)
          , o = v(s)
          , u = n(6)
          , a = n(1)
          , f = d(a)
          , l = n(7)
          , c = n(0)
          , h = n(8)
          , p = v(h)
          , b = function(e) {
            function t(n, r, i) {
                m(this, t);
                var s = g(this, e.call(this));
                s.$wrapper = u.utils.$(n);
                var o = s.$wrapper && s.$wrapper.children;
                if (!s.$wrapper || !o || !o.length)
                    throw new Error("Given base element doesn't exist or it hasn't proper DOM structure to be initialized.");
                return s._setOptions(r),
                s._setConfig(o, i),
                !u.utils.hasClickBug() && (s._setPointerEvents = function() {}
                ),
                s._build(),
                s._bindEvents(!0),
                s._applyPanelsCss(),
                s._arrangePanels(),
                s.options.hwAccelerable && f.SUPPORT_WILLCHANGE && s._setHint(),
                s.options.adaptiveHeight && s._setAdaptiveHeight(),
                s._adjustContainerCss("end"),
                s
            }
            return y(t, e),
            t.prototype._setOptions = function(t) {
                var n = {
                    previewPadding: [0, 0],
                    bounce: [10, 10]
                };
                this.options = u.utils.extend(u.utils.extend({}, l.OPTIONS), n, t);
                for (var r in n) {
                    var i = this.options[r];
                    typeof i == "number" ? i = [i, i] : u.utils.isArray(i) || (i = n[r]),
                    this.options[r] = i
                }
            }
            ,
            t.prototype._setConfig = function(t, n) {
                var r = this.options
                  , i = r.previewPadding
                  , s = t;
                u.utils.classList(s[0], r.prefix + "-container") && (s = s[0],
                this.$container = s,
                s = s.children),
                s = [].slice.call(s);
                var a = this._conf = u.utils.extend(u.utils.extend({}, l.CONFIG), {
                    panel: {
                        $list: s,
                        minCount: i[0] + i[1] > 0 ? 5 : 3
                    },
                    origPanelStyle: {
                        wrapper: {
                            className: this.$wrapper.getAttribute("class") || null,
                            style: this.$wrapper.getAttribute("style") || null
                        },
                        container: {
                            className: this.$container && this.$container.getAttribute("class") || null,
                            style: this.$container && this.$container.getAttribute("style") || null
                        },
                        list: s.map(function(e) {
                            return {
                                className: e.getAttribute("class") || null,
                                style: e.getAttribute("style") || null
                            }
                        })
                    },
                    useLayerHack: r.hwAccelerable && !f.SUPPORT_WILLCHANGE,
                    eventPrefix: n || ""
                });
                [["LEFT", "RIGHT"], ["UP", "DOWN"]][+!r.horizontal].forEach(function(e) {
                    return a.dirData.push(o["default"]["DIRECTION_" + e])
                })
            }
            ,
            t.prototype._build = function() {
                var t = this._conf.panel
                  , n = this.options
                  , r = t.$list
                  , i = n.previewPadding.concat()
                  , s = n.prefix
                  , a = n.horizontal
                  , f = t.count = t.origCount = r.length
                  , l = n.bounce;
                this._setPadding(i, !0);
                var h = this._getDataByDirection([t.size, "100%"])
                  , p = {
                    position: "relative",
                    zIndex: 2e3,
                    width: "100%",
                    height: "100%"
                };
                a && (p.top = "0px");
                if (this.$container)
                    u.utils.css(this.$container, p);
                else {
                    var d = r[0].parentNode
                      , v = c.document.createElement("div");
                    v.className = s + "-container",
                    u.utils.css(v, p),
                    r.forEach(function(e) {
                        return v.appendChild(e)
                    }),
                    d.appendChild(v),
                    this.$container = v
                }
                r.forEach(function(e) {
                    u.utils.classList(e, s + "-panel", !0),
                    u.utils.css(e, {
                        position: "absolute",
                        width: u.utils.getUnitValue(h[0]),
                        height: u.utils.getUnitValue(h[1]),
                        boxSizing: "border-box",
                        top: 0,
                        left: 0
                    })
                }),
                this._addClonePanels() && (f = t.count = (t.$list = [].slice.call(this.$container.children)).length),
                this._axesInst = new o["default"]({
                    flick: {
                        range: [0, t.size * (f - 1)],
                        bounce: l
                    }
                },{
                    easing: n.panelEffect,
                    deceleration: n.deceleration,
                    interruptable: !1
                }),
                this._setDefaultPanel(n.defaultIndex)
            }
            ,
            t.prototype._setPadding = function(t, n) {
                var r = this.options.horizontal
                  , i = this._conf.panel
                  , s = t[0] + t[1]
                  , o = {};
                if (s || !n)
                    o.padding = r ? "0 " + t.reverse().join("px 0 ") + "px" : t.join("px 0 ") + "px";
                n && (o.overflow = "hidden",
                o.boxSizing = "border-box"),
                Object.keys(o).length && u.utils.css(this.$wrapper, o);
                var a = getComputedStyle(this.$wrapper)
                  , f = r ? ["Left", "Right"] : ["Top", "Bottom"]
                  , l = Math.max(this.$wrapper["offset" + (r ? "Width" : "Height")], u.utils.getNumValue(a[r ? "width" : "height"]));
                i.size = l - (u.utils.getNumValue(a["padding" + f[0]]) + u.utils.getNumValue(a["padding" + f[1]]))
            }
            ,
            t.prototype._addClonePanels = function() {
                var t = this
                  , n = this._conf.panel
                  , r = n.origCount
                  , i = n.minCount - r
                  , s = n.$list
                  , o = void 0;
                if (this.options.circular && r < n.minCount) {
                    o = s.map(function(e) {
                        return e.cloneNode(!0)
                    });
                    while (o.length < i)
                        o = o.concat(s.map(function(e) {
                            return e.cloneNode(!0)
                        }));
                    return o.forEach(function(e) {
                        return t.$container.appendChild(e)
                    }),
                    !!o.length
                }
                return !1
            }
            ,
            t.prototype._movePanelPosition = function(t, n) {
                var r = this._conf.panel
                  , i = r.$list
                  , s = i.splice(n ? 0 : r.count - t, t);
                r.$list = n ? i.concat(s) : s.concat(i)
            }
            ,
            t.prototype._setDefaultPanel = function(t) {
                var n = this._conf.panel
                  , r = n.count - 1
                  , i = void 0
                  , s = void 0;
                this.options.circular ? (t > 0 && t <= r && this._movePanelPosition(t, !0),
                s = this._getBasePositionIndex(),
                this._movePanelPosition(s, !1),
                this._setPanelNo({
                    no: t,
                    currNo: t
                })) : t > 0 && t <= r && (this._setPanelNo({
                    index: t,
                    no: t,
                    currIndex: t,
                    currNo: t
                }),
                i = [-(n.size * t), 0],
                this._setTranslate(i),
                this._setAxes("setTo", Math.abs(i[0]), 0))
            }
            ,
            t.prototype._arrangePanels = function(t, n) {
                var r = this._conf
                  , i = r.panel
                  , s = r.touch
                  , o = r.dirData
                  , u = void 0;
                this.options.circular && (r.customEvent.flick = !1,
                t && (n && (s.direction = o[+!(n > 0)]),
                this._arrangePanelPosition(s.direction, n)),
                u = this._getBasePositionIndex(),
                this._setPanelNo({
                    index: u,
                    currIndex: u
                }),
                r.customEvent.flick = !!this._setAxes("setTo", i.size * i.index, 0)),
                this._applyPanelsPos()
            }
            ,
            t.prototype._applyPanelsPos = function() {
                this._conf.panel.$list.forEach(this._applyPanelsCss.bind(this))
            }
            ,
            t.prototype._setMoveStyle = function(t, n) {
                var r = f.TRANSFORM;
                this._setMoveStyle = r.support ? function(e, t) {
                    var n;
                    u.utils.css(e, (n = {},
                    n[r.name] = u.utils.translate(t[0], t[1], this._conf.useLayerHack),
                    n))
                }
                : function(e, t) {
                    u.utils.css(e, {
                        left: t[0],
                        top: t[1]
                    })
                }
                ,
                this._setMoveStyle(t, n)
            }
            ,
            t.prototype._applyPanelsCss = function() {
                var t = this._conf
                  , n = "__dummy_anchor";
                f.IS_ANDROID2 ? (t.$dummyAnchor = u.utils.$("." + n),
                !t.$dummyAnchor && this.$wrapper.appendChild(t.$dummyAnchor = u.utils.$('<a href="javascript:void(0)" class="' + n + '" style="position:absolute;height:0px;width:0px">')),
                this._applyPanelsCss = function(t, n) {
                    var r = this._getDataByDirection([this._conf.panel.size * n + "px", 0]);
                    u.utils.css(t, {
                        left: r[0],
                        top: r[1]
                    })
                }
                ) : this._applyPanelsCss = function(t, n) {
                    var r = this._getDataByDirection([f.TRANSFORM.support ? 100 * n + "%" : this._conf.panel.size * n + "px", 0]);
                    this._setMoveStyle(t, r)
                }
            }
            ,
            t.prototype._adjustContainerCss = function(t, n) {
                var r = this._conf
                  , i = r.panel
                  , s = this.options
                  , o = s.horizontal
                  , a = s.previewPadding[0]
                  , l = this.$container
                  , c = n
                  , h = void 0;
                if (f.IS_ANDROID2) {
                    c || (c = -i.size * i.index);
                    if (t === "start")
                        l = l.style,
                        h = parseInt(l[o ? "left" : "top"], 10),
                        o ? h && (l.left = "0px") : h !== a && (l.top = "0px"),
                        this._setTranslate([-c, 0]);
                    else if (t === "end") {
                        var p;
                        c = this._getCoordsValue([c, 0]),
                        u.utils.css(l, (p = {
                            left: c.x,
                            top: c.y
                        },
                        p[f.TRANSFORM.name] = u.utils.translate(0, 0, r.useLayerHack),
                        p)),
                        r.$dummyAnchor.focus()
                    }
                }
            }
            ,
            t.prototype._setAxes = function(t, n, r) {
                return this._axesInst[t]({
                    flick: n
                }, r)
            }
            ,
            t.prototype._setHint = function() {
                var t = {
                    willChange: "transform"
                };
                u.utils.css(this.$container, t),
                u.utils.css(this._conf.panel.$list, t)
            }
            ,
            t.prototype._getDataByDirection = function(t) {
                var n = t.concat();
                return !this.options.horizontal && n.reverse(),
                n
            }
            ,
            t.prototype._arrangePanelPosition = function(t, n) {
                var r = t === this._conf.dirData[0];
                this._movePanelPosition(Math.abs(n || 1), r)
            }
            ,
            t.prototype._getBasePositionIndex = function() {
                return Math.floor(this._conf.panel.count / 2 - .1)
            }
            ,
            t.prototype._bindEvents = function(t) {
                var n = this.options
                  , r = this.$wrapper
                  , i = this._axesInst;
                t ? (this._panInput = new o["default"].PanInput(r,{
                    inputType: n.inputType,
                    thresholdAngle: n.thresholdAngle,
                    scale: this._getDataByDirection([-1, 0])
                }),
                i.on({
                    hold: this._holdHandler.bind(this),
                    change: this._changeHandler.bind(this),
                    release: this._releaseHandler.bind(this),
                    animationStart: this._animationStartHandler.bind(this),
                    animationEnd: this._animationEndHandler.bind(this)
                }).connect(this._getDataByDirection(["flick", ""]), this._panInput)) : (this.disableInput(),
                i.off())
            }
            ,
            t.prototype._setAdaptiveHeight = function(t) {
                var n = this._conf
                  , r = n.indexToMove
                  , i = void 0
                  , s = void 0
                  , a = r === 0 ? this["get" + (t === o["default"].DIRECTION_LEFT && "Next" || t === o["default"].DIRECTION_RIGHT && "Prev" || "") + "Element"]() : n.panel.$list[n.panel.currIndex + r]
                  , l = a.querySelector(":first-child");
                l && (s = l.getAttribute(f.DATA_HEIGHT),
                s || (i = a.children,
                s = u.utils.outerHeight(i.length > 1 ? (a.style.height = "auto",
                a) : l),
                s > 0 && l.setAttribute(f.DATA_HEIGHT, s)),
                s > 0 && (this.$wrapper.style.height = s + "px"))
            }
            ,
            t.prototype._triggerBeforeRestore = function(t) {
                var n = this._conf
                  , r = n.touch;
                r.direction = +n.dirData.join("").replace(r.direction, ""),
                n.customEvent.restore = this._triggerEvent(f.EVENTS.beforeRestore, {
                    depaPos: t.depaPos.flick,
                    destPos: t.destPos.flick
                }),
                n.customEvent.restore || ("stop"in t && t.stop(),
                n.panel.animating = !1)
            }
            ,
            t.prototype._triggerRestore = function() {
                var t = this._conf.customEvent;
                t.restore && this._triggerEvent(f.EVENTS.restore),
                t.restore = t.restoreCall = !1
            }
            ,
            t.prototype._setPhaseValue = function(t, n) {
                var r = this._conf
                  , i = this.options
                  , s = r.panel;
                if (t === "start" && (s.changed = this._isMovable())) {
                    if (!this._triggerEvent(f.EVENTS.beforeFlickStart, n))
                        return s.changed = s.animating = !1,
                        !1;
                    i.adaptiveHeight && this._setAdaptiveHeight(r.touch.direction),
                    r.indexToMove === 0 && this._setPanelNo()
                } else
                    t === "end" && (i.circular && s.changed && this._arrangePanels(!0, r.indexToMove),
                    !f.IS_ANDROID2 && this._setTranslate([-s.size * s.index, 0]),
                    r.touch.distance = r.indexToMove = 0,
                    s.changed && this._triggerEvent(f.EVENTS.flickEnd));
                return this._adjustContainerCss(t),
                !0
            }
            ,
            t.prototype._getNumByDirection = function() {
                var t = this._conf;
                return t.touch.direction === t.dirData[0] ? 1 : -1
            }
            ,
            t.prototype._revertPanelNo = function() {
                var t = this._conf.panel
                  , n = this._getNumByDirection()
                  , r = t.currIndex >= 0 ? t.currIndex : t.index - n
                  , i = t.currNo >= 0 ? t.currNo : t.no - n;
                this._setPanelNo({
                    index: r,
                    no: i
                })
            }
            ,
            t.prototype._setPanelNo = function(t) {
                var n = this._conf.panel
                  , r = n.origCount - 1
                  , i = this._getNumByDirection();
                if (u.utils.isObject(t))
                    for (var s in t)
                        n[s] = t[s];
                else
                    n.currIndex = n.index,
                    n.currNo = n.no,
                    n.index += i,
                    n.no += i;
                n.no > r ? n.no = 0 : n.no < 0 && (n.no = r)
            }
            ,
            t.prototype._setPointerEvents = function(t) {
                var n = u.utils.css(this.$container, "pointerEvents")
                  , r = void 0;
                t && t.holding && t.inputEvent && t.inputEvent.preventSystemEvent && n !== "none" ? r = "none" : !t && n !== "auto" && (r = "auto"),
                r && u.utils.css(this.$container, {
                    pointerEvents: r
                })
            }
            ,
            t.prototype._getCoordsValue = function(t) {
                var n = this._getDataByDirection(t);
                return {
                    x: u.utils.getUnitValue(n[0]),
                    y: u.utils.getUnitValue(n[1])
                }
            }
            ,
            t.prototype._setTranslate = function(t) {
                var n = this._getCoordsValue(t);
                this._setMoveStyle(this.$container, [n.x, n.y])
            }
            ,
            t.prototype._isMovable = function() {
                var t = this.options
                  , n = this._axesInst
                  , r = Math.abs(this._conf.touch.distance) >= t.threshold
                  , i = void 0
                  , s = void 0;
                if (!t.circular && r) {
                    i = n.axis.flick.range[1],
                    s = n.get().flick;
                    if (s < 0 || s > i)
                        return !1
                }
                return r
            }
            ,
            t.prototype._triggerEvent = function(t, n) {
                var r = this._conf
                  , i = r.panel;
                return t === f.EVENTS.flickEnd && (i.currNo = i.no,
                i.currIndex = i.index),
                this.trigger(r.eventPrefix + t, u.utils.extend({
                    eventType: t,
                    index: i.currIndex,
                    no: i.currNo,
                    direction: r.touch.direction
                }, n))
            }
            ,
            t.prototype._getElement = function(t, n, r) {
                var i = this._conf.panel
                  , s = this.options.circular
                  , o = i.currIndex
                  , u = t === this._conf.dirData[0]
                  , a = null
                  , f = void 0
                  , l = void 0;
                r ? (f = i.count,
                l = o) : (f = i.origCount,
                l = i.currNo);
                var c = l;
                return u ? l < f - 1 ? l++ : s && (l = 0) : l > 0 ? l-- : s && (l = f - 1),
                c !== l && (a = n ? i.$list[u ? o + 1 : o - 1] : l),
                a
            }
            ,
            t.prototype._setValueToMove = function(t) {
                var n = this._conf;
                n.touch.distance = this.options.threshold + 1,
                n.touch.direction = n.dirData[+!t]
            }
            ,
            t.prototype.getIndex = function(t) {
                return this._conf.panel[t ? "currIndex" : "currNo"]
            }
            ,
            t.prototype.getElement = function() {
                var t = this._conf.panel;
                return t.$list[t.currIndex]
            }
            ,
            t.prototype.getNextElement = function() {
                return this._getElement(this._conf.dirData[0], !0)
            }
            ,
            t.prototype.getNextIndex = function(t) {
                return this._getElement(this._conf.dirData[0], !1, t)
            }
            ,
            t.prototype.getAllElements = function() {
                return this._conf.panel.$list
            }
            ,
            t.prototype.getPrevElement = function() {
                return this._getElement(this._conf.dirData[1], !0)
            }
            ,
            t.prototype.getPrevIndex = function(t) {
                return this._getElement(this._conf.dirData[1], !1, t)
            }
            ,
            t.prototype.getTotalCount = function(t) {
                return this._conf.panel[t ? "count" : "origCount"]
            }
            ,
            t.prototype.isPlaying = function() {
                return this._conf.panel.animating
            }
            ,
            t.prototype._movePanel = function(t, n) {
                var r = this._conf
                  , i = r.panel
                  , s = this.options;
                return i.animating || r.touch.holding ? undefined : (this._setValueToMove(t),
                (s.circular || this["get" + (t ? "Next" : "Prev") + "Index"]() !== null) && this._movePanelByPhase("setBy", i.size * (t ? 1 : -1), n),
                this)
            }
            ,
            t.prototype._movePanelByPhase = function(t, n, r) {
                var i = u.utils.getNumValue(r, this.options.duration);
                this._setPhaseValue("start") !== !1 && (this._setAxes(t, n, i),
                !i && this._setPhaseValue("end"))
            }
            ,
            t.prototype.next = function(t) {
                return this._movePanel(!0, t)
            }
            ,
            t.prototype.prev = function(t) {
                return this._movePanel(!1, t)
            }
            ,
            t.prototype.moveTo = function(t, n) {
                var r = this._conf
                  , i = r.panel
                  , s = this.options.circular
                  , o = i.index
                  , a = void 0
                  , f = void 0
                  , l = t;
                return l = u.utils.getNumValue(l, -1),
                l < 0 || l >= i.origCount || l === i.no || i.animating || r.touch.holding ? this : (a = l - (s ? i.no : o),
                f = a > 0,
                s && Math.abs(a) > (f ? i.count - (o + 1) : o) && (a += (f ? -1 : 1) * i.count,
                f = a > 0),
                this._setPanelNo(s ? {
                    no: l
                } : {
                    no: l,
                    index: l
                }),
                this._conf.indexToMove = a,
                this._setValueToMove(f),
                this._movePanelByPhase(s ? "setBy" : "setTo", i.size * (s ? a : l), n),
                this)
            }
            ,
            t.prototype.resize = function() {
                var t = this._conf
                  , n = this.options
                  , r = t.panel
                  , i = n.horizontal
                  , s = void 0;
                if (!this.isPlaying()) {
                    var o;
                    u.utils.isArray(n.previewPadding) && typeof +n.previewPadding.join("") == "number" ? (this._setPadding(n.previewPadding.concat()),
                    s = r.size) : i && (s = r.size = u.utils.css(this.$wrapper, "width", !0));
                    var a = s * (r.count - 1)
                      , l = this._getDataByDirection([a, 0]);
                    i && u.utils.css(this.$container, {
                        width: l[0] + s + "px"
                    }),
                    u.utils.css(r.$list, (o = {},
                    o[i ? "width" : "height"] = u.utils.getUnitValue(s),
                    o));
                    if (n.adaptiveHeight) {
                        var c = this.$container.querySelectorAll("[" + f.DATA_HEIGHT + "]");
                        c.length && ([].slice.call(c).forEach(function(e) {
                            return e.removeAttribute(f.DATA_HEIGHT)
                        }),
                        this._setAdaptiveHeight())
                    }
                    this._axesInst.axis.flick.range = [0, a],
                    this._setAxes("setTo", s * r.index, 0),
                    f.IS_ANDROID2 && (this._applyPanelsPos(),
                    this._adjustContainerCss("end"))
                }
                return this
            }
            ,
            t.prototype.restore = function(t) {
                var n = this._conf
                  , r = n.panel
                  , i = this._axesInst.get().flick
                  , s = t
                  , o = void 0;
                return i !== r.currIndex * r.size ? (n.customEvent.restoreCall = !0,
                s = u.utils.getNumValue(s, this.options.duration),
                this._revertPanelNo(),
                o = r.size * r.index,
                this._triggerBeforeRestore({
                    depaPos: i,
                    destPos: o
                }),
                this._setAxes("setTo", o, s),
                s || (this._adjustContainerCss("end"),
                this._triggerRestore())) : r.changed && (this._revertPanelNo(),
                n.touch.distance = n.indexToMove = 0),
                this
            }
            ,
            t.prototype.enableInput = function() {
                return this._panInput.enable(),
                this
            }
            ,
            t.prototype.disableInput = function() {
                return this._panInput.disable(),
                this
            }
            ,
            t.prototype.getStatus = function(t) {
                var n = this._conf.panel
                  , r = /((?:-webkit-)?transform|left|top|will-change|box-sizing|width):[^;]*;/g
                  , i = {
                    panel: {
                        index: n.index,
                        no: n.no,
                        currIndex: n.currIndex,
                        currNo: n.currNo
                    },
                    $list: n.$list.map(function(e) {
                        return {
                            style: e.style.cssText.replace(r, "").trim(),
                            className: e.className,
                            html: e.innerHTML
                        }
                    })
                };
                return t ? JSON.stringify(i) : i
            }
            ,
            t.prototype.setStatus = function(t) {
                var n = this._conf.panel
                  , r = this.options.adaptiveHeight
                  , i = typeof t == "string" ? JSON.parse(t) : t;
                if (i) {
                    for (var s in i.panel)
                        s in n && (n[s] = i.panel[s]);
                    n.$list.forEach(function(e, t) {
                        var n = i.$list[t]
                          , r = n.style
                          , s = n.className
                          , o = n.html;
                        r && (e.style.cssText += r),
                        s && (e.className = s),
                        o && (e.innerHTML = o)
                    }),
                    r && this._setAdaptiveHeight()
                }
            }
            ,
            t.prototype.destroy = function() {
                var t = this._conf
                  , n = t.origPanelStyle
                  , r = n.wrapper
                  , i = n.container
                  , s = n.list
                  , o = this.$wrapper;
                o.setAttribute("class", r.className),
                o[r.style ? "setAttribute" : "removeAttribute"]("style", r.style);
                var u = this.$container
                  , a = [].slice.call(u.children);
                n.container.className ? (u.setAttribute("class", i.className),
                u[i.style ? "setAttribute" : "removeAttribute"]("style", i.style)) : (a.forEach(function(e) {
                    return o.appendChild(e)
                }),
                u.parentNode.removeChild(u));
                for (var f = 0, l; l = a[f]; f++)
                    if (f > s.length - 1)
                        l.parentNode.removeChild(l);
                    else {
                        var c = s[f].className
                          , h = s[f].style;
                        l[c ? "setAttribute" : "removeAttribute"]("class", c),
                        l[h ? "setAttribute" : "removeAttribute"]("style", h)
                    }
                this._bindEvents(!1),
                this.off(),
                this._axesInst.destroy(),
                this._panInput.destroy();
                for (var p in this)
                    this[p] = null
            }
            ,
            t
        }((0,
        u.Mixin)(i["default"])["with"](p["default"]));
        b.DIRECTION_NONE = o["default"].DIRECTION_NONE,
        b.DIRECTION_LEFT = o["default"].DIRECTION_LEFT,
        b.DIRECTION_RIGHT = o["default"].DIRECTION_RIGHT,
        b.DIRECTION_UP = o["default"].DIRECTION_UP,
        b.DIRECTION_DOWN = o["default"].DIRECTION_DOWN,
        b.DIRECTION_HORIZONTAL = o["default"].DIRECTION_HORIZONTAL,
        b.DIRECTION_VERTICAL = o["default"].DIRECTION_VERTICAL,
        b.DIRECTION_ALL = o["default"].DIRECTION_ALL,
        t["default"] = b,
        e.exports = t["default"]
    }
    , function(t, n) {
        t.exports = e
    }
    , function(e, n) {
        e.exports = t
    }
    , function(e, t, n) {
        "use strict";
        function s(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        t.__esModule = !0,
        t.Mixin = t.utils = undefined;
        var r = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(e) {
            return typeof e
        }
        : function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }
          , i = n(0)
          , o = {
            $: function(t) {
                var n = null;
                if (typeof t == "string") {
                    var r = t.match(/^<([a-z]+)\s*([^>]*)>/);
                    r ? (n = i.document.createElement(r[1]),
                    r.length === 3 && r[2].split(" ").forEach(function(e) {
                        var t = e.split("=");
                        n.setAttribute(t[0], t[1].trim().replace(/(^["']|["']$)/g, ""))
                    })) : (n = i.document.querySelectorAll(t),
                    n.length ? n.length === 1 && (n = n[0]) : n = null)
                } else
                    t.nodeName && t.nodeType === 1 && (n = t);
                return n
            },
            isArray: function(t) {
                return t && t.constructor === Array
            },
            isObject: function(t) {
                return t && !t.nodeType && (typeof t == "undefined" ? "undefined" : r(t)) === "object" && !this.isArray(t)
            },
            extend: function(t) {
                var n = this;
                for (var r = arguments.length, i = Array(r > 1 ? r - 1 : 0), s = 1; s < r; s++)
                    i[s - 1] = arguments[s];
                if (!i.length || i.length === 1 && !i[0])
                    return t;
                var o = i.shift();
                return this.isObject(t) && this.isObject(o) && Object.keys(o).forEach(function(e) {
                    var r = o[e];
                    n.isObject(r) ? (!t[e] && (t[e] = {}),
                    t[e] = n.extend(t[e], r)) : t[e] = n.isArray(r) ? r.concat() : r
                }),
                this.extend.apply(this, [t].concat(i))
            },
            css: function(t, n, r) {
                if (typeof n == "string") {
                    var s = i.window.getComputedStyle(t)[n];
                    return r ? this.getNumValue(s) : s
                }
                var o = function(t, n) {
                    return Object.keys(n).forEach(function(e) {
                        t[e] = n[e]
                    })
                };
                return this.isArray(t) ? t.forEach(function(e) {
                    return o(e.style, n)
                }) : o(t.style, n),
                t
            },
            classList: function(t, n, r) {
                var i = typeof r == "boolean"
                  , s = void 0;
                return t.classList ? s = t.classList[i && (r ? "add" : "remove") || "contains"](n) : (s = t.className,
                i ? r && s.indexOf(n) === -1 ? s = t.className = (s + " " + n).replace(/\s{2,}/g, " ") : r || (s = t.className = s.replace(n, "")) : s = (new RegExp("\\b" + n + "\\b")).test(s)),
                s
            },
            getNumValue: function(t, n) {
                var r = t;
                return isNaN(r = parseInt(r, 10)) ? n : r
            },
            getUnitValue: function(t) {
                var n = /(?:[a-z]{2,}|%)$/;
                return (parseInt(t, 10) || 0) + (String(t).match(n) || "px")
            },
            getOuter: function(t, n) {
                var r = i.window.getComputedStyle(t)
                  , s = n === "outerWidth" ? ["marginLeft", "marginRight"] : ["marginTop", "marginBottom"];
                return this.getNumValue(r[n.replace("outer", "").toLocaleLowerCase()]) + this.getNumValue(r[s[0]]) + this.getNumValue(r[s[1]])
            },
            outerWidth: function(t) {
                return this.getOuter(t, "outerWidth")
            },
            outerHeight: function(t) {
                return this.getOuter(t, "outerHeight")
            },
            isHWAccelerable: function() {
                var t = i.window.navigator.userAgent
                  , n = !1
                  , r = void 0;
                if (r = t.match(/Chrome\/(\d+)/))
                    n = r[1] >= "25";
                else if (/ie|edge|firefox|safari|inapp/.test(t))
                    n = !0;
                else if (r = t.match(/Android ([\d.]+)/)) {
                    var s = r[1]
                      , o = (t.match(/\(.*\)/) || [null])[0];
                    n = s >= "4.1.0" && !/EK-GN120|SM-G386F/.test(o) || s >= "4.0.3" && /SHW-|SHV-|GT-|SCH-|SGH-|SPH-|LG-F160|LG-F100|LG-F180|LG-F200|EK-|IM-A|LG-F240|LG-F260/.test(o) && !/SHW-M420|SHW-M200|GT-S7562/.test(o)
                }
                return this.isHWAccelerable = function() {
                    return n
                }
                ,
                n
            },
            translate: function(t, n, r) {
                return r || !1 ? "translate3d(" + t + "," + n + ",0)" : "translate(" + t + "," + n + ")"
            },
            hasClickBug: function() {
                var t = i.window.navigator.userAgent
                  , n = /Safari/.test(t);
                return this.hasClickBug = function() {
                    return n
                }
                ,
                n
            }
        }
          , u = function() {
            function e(t) {
                s(this, e),
                this.superclass = t || function() {
                    function e() {
                        s(this, e)
                    }
                    return e
                }()
            }
            return e.prototype["with"] = function() {
                for (var t = arguments.length, n = Array(t), r = 0; r < t; r++)
                    n[r] = arguments[r];
                return n.reduce(function(e, t) {
                    return t(e)
                }, this.superclass)
            }
            ,
            e
        }()
          , a = function(t) {
            return new u(t)
        };
        t.utils = o,
        t.Mixin = a
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = {
            panel: {
                $list: null,
                index: 0,
                no: 0,
                currIndex: 0,
                currNo: 0,
                size: 0,
                count: 0,
                origCount: 0,
                changed: !1,
                animating: !1,
                minCount: 3
            },
            touch: {
                holdPos: 0,
                destPos: 0,
                distance: 0,
                direction: null,
                lastPos: 0,
                holding: !1
            },
            customEvent: {
                flick: !0,
                restore: !1,
                restoreCall: !1
            },
            dirData: [],
            indexToMove: 0,
            $dummyAnchor: null
        }
          , i = {
            hwAccelerable: !0,
            prefix: "eg-flick",
            deceleration: 6e-4,
            horizontal: !0,
            circular: !1,
            previewPadding: null,
            bounce: null,
            threshold: 40,
            duration: 100,
            panelEffect: function(t) {
                return 1 - Math.pow(1 - t, 3)
            },
            defaultIndex: 0,
            inputType: ["touch", "mouse"],
            thresholdAngle: 45,
            adaptiveHeight: !1
        };
        t.CONFIG = r,
        t.OPTIONS = i
    }
    , function(e, t, n) {
        "use strict";
        function s(e) {
            if (e && e.__esModule)
                return e;
            var t = {};
            if (e != null)
                for (var n in e)
                    Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
            return t["default"] = e,
            t
        }
        function o(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        function u(e, t) {
            if (!e)
                throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || typeof t != "object" && typeof t != "function" ? e : t
        }
        function a(e, t) {
            if (typeof t != "function" && t !== null)
                throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        t.__esModule = !0;
        var r = n(1)
          , i = s(r);
        t["default"] = function(e) {
            return function(e) {
                function t() {
                    return o(this, t),
                    u(this, e.apply(this, arguments))
                }
                return a(t, e),
                t.prototype._holdHandler = function(t) {
                    var n = this._conf
                      , r = t.pos.flick;
                    n.touch.holdPos = r,
                    n.touch.holding = !0,
                    n.panel.changed = !1,
                    this._adjustContainerCss("start", r)
                }
                ,
                t.prototype._changeHandler = function(t) {
                    var n = this._conf
                      , r = n.touch
                      , s = t.pos.flick
                      , o = r.holdPos
                      , u = void 0
                      , a = null
                      , f = void 0;
                    this._setPointerEvents(t),
                    t.inputEvent ? (u = t.inputEvent.direction,
                    f = t.inputEvent[this.options.horizontal ? "deltaX" : "deltaY"],
                    ~n.dirData.indexOf(u) || (u = n.dirData[+(Math.abs(r.lastPos) <= f)]),
                    r.lastPos = f) : r.lastPos = null,
                    n.customEvent.flick && (a = this._triggerEvent(i.EVENTS.flick, {
                        pos: s,
                        holding: t.holding,
                        direction: u || r.direction,
                        distance: s - o
                    })),
                    (a || a === null) && this._setTranslate([-s, 0])
                }
                ,
                t.prototype._releaseHandler = function(t) {
                    var n = this._conf
                      , r = n.touch
                      , i = r.holdPos
                      , s = n.panel.size
                      , o = n.customEvent
                      , u = r.holdPos < t.depaPos.flick;
                    r.distance = t.depaPos.flick - i,
                    r.direction = n.dirData[+!u],
                    r.destPos = i + (u ? s : -s);
                    var a = r.distance
                      , f = this.options.duration
                      , l = i;
                    this._isMovable() ? (!o.restoreCall && (o.restore = !1),
                    l = r.destPos) : Math.abs(a) > 0 ? this._triggerBeforeRestore(t) : f = 0,
                    t.setTo({
                        flick: l
                    }, f),
                    a === 0 && this._adjustContainerCss("end"),
                    r.holding = !1,
                    this._setPointerEvents()
                }
                ,
                t.prototype._animationStartHandler = function(t) {
                    var n = this._conf
                      , r = n.panel
                      , i = n.customEvent
                      , s = t.inputEvent || n.touch.lastPos;
                    !i.restoreCall && s && this._setPhaseValue("start", {
                        depaPos: t.depaPos.flick,
                        destPos: t.destPos.flick
                    }) === !1 && t.stop(),
                    s && (t.duration = this.options.duration,
                    t.destPos.flick = r.size * (r.index + n.indexToMove)),
                    r.animating = !0
                }
                ,
                t.prototype._animationEndHandler = function() {
                    this._conf.panel.animating = !1,
                    this._setPhaseValue("end"),
                    this._triggerRestore()
                }
                ,
                t
            }(e)
        }
        ,
        e.exports = t["default"]
    }
    ])
});
(function(e, t, n) {
    function i(e) {
        var t, n = e, r;
        return (t = document.getElementById(e) || e) && t.tagName && (r = t.tagName.toUpperCase()) && (r === "TEXTAREA" || r === "SCRIPT" && t.getAttribute("type") === "text/template") && (n = (t.value || t.innerHTML).replace(/^\s+|\s+$/g, "")),
        n
    }
    function s(e) {
        return e.replace(/\\/g, "\\\\").replace(/"/g, '\\"').replace(/\n/g, "\\n")
    }
    function o(e) {
        if (r[e])
            return r[e];
        var t = i(e);
        t = t.replace(/\\{/g, "#LEFT_CURLY_BRACKET#").replace(/\\}/g, "#RIGHT_CURLY_BRACKET#");
        var n = []
          , o = !1;
        n.push("var $RET$ = [];"),
        n.push("var $SCOPE$ = $ARG$ && typeof $ARG$ === 'object' ? $ARG$ : {};"),
        n.push("with ($SCOPE$) {");
        var u = 0;
        do
            o = !1,
            t = t.replace(/^[^{]+/, function(e) {
                return o = n.push('$RET$.push("' + s(e) + '");'),
                ""
            }),
            t = t.replace(/^{=([^}]+)}/, function(e, t) {
                return o = n.push("typeof " + t + ' != "undefined" && $RET$.push(' + t + ");"),
                ""
            }),
            t = t.replace(/^{js\s+([^}]+)}/, function(e, t) {
                return t = t.replace(/(=(?:[a-zA-Z_][\w\.]*)+)/g, function(e) {
                    return e.replace("=", "")
                }),
                o = n.push("$RET$.push(" + t + ");"),
                ""
            }),
            t = t.replace(/^{(g)?set\s+([^=]+)=([^}]+)}/, function(e, t, r, i) {
                return o = n.push((t ? "var " : "$SCOPE$.") + r + "=" + i.replace(/(\s|\(|\[)=/g, "$1") + ";"),
                ""
            }),
            t = t.replace(/^{for\s+([^:}]+)(?:\s*)(:(.+))?\s+in\s+([^}]+)}/, function(e, t, r, i, s) {
                i || (i = t,
                t = "$NULL$" + u);
                var a = "$I$" + u
                  , f = "$CB$" + u;
                return u++,
                n.push("(function(" + f + ") {"),
                n.push("if (jQuery.isArray(" + s + ")) {"),
                n.push("for (var " + a + " = 0; " + a + " < " + s + ".length; " + a + "++) {"),
                n.push(f + "(" + a + ", " + s + "[" + a + "]);"),
                n.push("}"),
                n.push("} else {"),
                n.push("for (var " + a + " in " + s + ") if (" + s + ".hasOwnProperty(" + a + ")) { "),
                n.push(f + "(" + a + ", " + s + "[" + a + "]);"),
                n.push("}"),
                n.push("}"),
                n.push("})(function(" + t + ", " + i + ") {"),
                o = !0,
                ""
            }),
            t = t.replace(/^{\/for}/, function() {
                return o = n.push("});"),
                ""
            }),
            t = t.replace(/^{(else)?if\s+([^}]+)}/, function(e, t, r) {
                var i = (r.match(/(\w+)\.?/) || [, ])[1], s;
                return i && (s = RegExp("function\\([$\\w]*,?[\\s]*" + i + "[^)]*\\)").test(n.join(""))),
                i = !i || s ? "" : "$SCOPE$." + i + " && ",
                o = n.push((t ? "} else " : "") + "if (" + i + r + " ) {"),
                ""
            }),
            t = t.replace(/^{else}/, function() {
                return o = n.push("} else {"),
                ""
            }),
            t = t.replace(/^{\/if}/, function() {
                return o = n.push("}"),
                ""
            });
        while (o);
        n.push("}"),
        n.push('return $RET$.join("");');
        var a = new Function("$ARG$",n.join("\n").replace(/\r/g, "").replace(/#LEFT_CURLY_BRACKET#/g, "{").replace(/#RIGHT_CURLY_BRACKET#/g, "}"));
        return r[e] = a,
        a
    }
    t || (n.eg = t = {});
    var r = {};
    t.template = function(e, t) {
        var n = o(e);
        return n(t)
    }
}
)(jQuery, eg, window, document);
(function(e, t, n) {
    function s(n, r) {
        this.wrapper = typeof n == "string" ? t.querySelector(n) : n,
        this.scroller = this.wrapper.children[0],
        this.scrollerStyle = this.scroller.style,
        this.options = {
            resizeScrollbars: !0,
            mouseWheelSpeed: 20,
            snapThreshold: .334,
            disablePointer: !i.hasPointer,
            disableTouch: i.hasPointer || !i.hasTouch,
            disableMouse: i.hasPointer || i.hasTouch,
            startX: 0,
            startY: 0,
            scrollY: !0,
            directionLockThreshold: 5,
            momentum: !0,
            bounce: !0,
            bounceTime: 600,
            bounceEasing: "",
            preventDefault: !0,
            preventDefaultException: {
                tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT)$/
            },
            HWCompositing: !0,
            useTransition: !0,
            useTransform: !0,
            bindToWrapper: typeof e.onmousedown == "undefined"
        };
        for (var s in r)
            this.options[s] = r[s];
        this.translateZ = this.options.HWCompositing && i.hasPerspective ? " translateZ(0)" : "",
        this.options.useTransition = i.hasTransition && this.options.useTransition,
        this.options.useTransform = i.hasTransform && this.options.useTransform,
        this.options.eventPassthrough = this.options.eventPassthrough === !0 ? "vertical" : this.options.eventPassthrough,
        this.options.preventDefault = !this.options.eventPassthrough && this.options.preventDefault,
        this.options.scrollY = this.options.eventPassthrough == "vertical" ? !1 : this.options.scrollY,
        this.options.scrollX = this.options.eventPassthrough == "horizontal" ? !1 : this.options.scrollX,
        this.options.freeScroll = this.options.freeScroll && !this.options.eventPassthrough,
        this.options.directionLockThreshold = this.options.eventPassthrough ? 0 : this.options.directionLockThreshold,
        this.options.bounceEasing = typeof this.options.bounceEasing == "string" ? i.ease[this.options.bounceEasing] || i.ease.circular : this.options.bounceEasing,
        this.options.resizePolling = this.options.resizePolling === undefined ? 60 : this.options.resizePolling,
        this.options.tap === !0 && (this.options.tap = "tap"),
        !this.options.useTransition && !this.options.useTransform && (/relative|absolute/i.test(this.scrollerStyle.position) || (this.scrollerStyle.position = "relative")),
        this.options.shrinkScrollbars == "scale" && (this.options.useTransition = !1),
        this.options.invertWheelDirection = this.options.invertWheelDirection ? -1 : 1,
        this.options.probeType == 3 && (this.options.useTransition = !1),
        this.x = 0,
        this.y = 0,
        this.directionX = 0,
        this.directionY = 0,
        this._events = {},
        this._init(),
        this.refresh(),
        this.scrollTo(this.options.startX, this.options.startY),
        this.enable()
    }
    function o(e, n, r) {
        var i = t.createElement("div")
          , s = t.createElement("div");
        return r === !0 && (i.style.cssText = "position:absolute;z-index:9999",
        s.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:absolute;background:rgba(0,0,0,0.5);border:1px solid rgba(255,255,255,0.9);border-radius:3px"),
        s.className = "iScrollIndicator",
        e == "h" ? (r === !0 && (i.style.cssText += ";height:7px;left:2px;right:2px;bottom:0",
        s.style.height = "100%"),
        i.className = "iScrollHorizontalScrollbar") : (r === !0 && (i.style.cssText += ";width:7px;bottom:2px;top:2px;right:1px",
        s.style.width = "100%"),
        i.className = "iScrollVerticalScrollbar"),
        i.style.cssText += ";overflow:hidden",
        n || (i.style.pointerEvents = "none"),
        i.appendChild(s),
        i
    }
    function u(n, s) {
        this.wrapper = typeof s.el == "string" ? t.querySelector(s.el) : s.el,
        this.wrapperStyle = this.wrapper.style,
        this.indicator = this.wrapper.children[0],
        this.indicatorStyle = this.indicator.style,
        this.scroller = n,
        this.options = {
            listenX: !0,
            listenY: !0,
            interactive: !1,
            resize: !0,
            defaultScrollbars: !1,
            shrink: !1,
            fade: !1,
            speedRatioX: 0,
            speedRatioY: 0
        };
        for (var o in s)
            this.options[o] = s[o];
        this.sizeRatioX = 1,
        this.sizeRatioY = 1,
        this.maxPosX = 0,
        this.maxPosY = 0,
        this.options.interactive && (this.options.disableTouch || (i.addEvent(this.indicator, "touchstart", this),
        i.addEvent(e, "touchend", this)),
        this.options.disablePointer || (i.addEvent(this.indicator, i.prefixPointerEvent("pointerdown"), this),
        i.addEvent(e, i.prefixPointerEvent("pointerup"), this)),
        this.options.disableMouse || (i.addEvent(this.indicator, "mousedown", this),
        i.addEvent(e, "mouseup", this)));
        if (this.options.fade) {
            this.wrapperStyle[i.style.transform] = this.scroller.translateZ;
            var u = i.style.transitionDuration;
            if (!u)
                return;
            this.wrapperStyle[u] = i.isBadAndroid ? "0.0001ms" : "0ms";
            var a = this;
            i.isBadAndroid && r(function() {
                a.wrapperStyle[u] === "0.0001ms" && (a.wrapperStyle[u] = "0s")
            }),
            this.wrapperStyle.opacity = "0"
        }
    }
    var r = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame || function(t) {
        e.setTimeout(t, 1e3 / 60)
    }
      , i = function() {
        function o(e) {
            return s === !1 ? !1 : s === "" ? e : s + e.charAt(0).toUpperCase() + e.substr(1)
        }
        var r = {}
          , i = t.createElement("div").style
          , s = function() {
            var e = ["t", "webkitT", "MozT", "msT", "OT"], t, n = 0, r = e.length;
            for (; n < r; n++) {
                t = e[n] + "ransform";
                if (t in i)
                    return e[n].substr(0, e[n].length - 1)
            }
            return !1
        }();
        r.getTime = Date.now || function() {
            return (new Date).getTime()
        }
        ,
        r.extend = function(e, t) {
            for (var n in t)
                e[n] = t[n]
        }
        ,
        r.addEvent = function(e, t, n, r) {
            e.addEventListener(t, n, !!r)
        }
        ,
        r.removeEvent = function(e, t, n, r) {
            e.removeEventListener(t, n, !!r)
        }
        ,
        r.prefixPointerEvent = function(t) {
            return e.MSPointerEvent ? "MSPointer" + t.charAt(7).toUpperCase() + t.substr(8) : t
        }
        ,
        r.momentum = function(e, t, r, i, s, o) {
            var u = e - t, a = n.abs(u) / r, f, l;
            return o = o === undefined ? 6e-4 : o,
            f = e + a * a / (2 * o) * (u < 0 ? -1 : 1),
            l = a / o,
            f < i ? (f = s ? i - s / 2.5 * (a / 8) : i,
            u = n.abs(f - e),
            l = u / a) : f > 0 && (f = s ? s / 2.5 * (a / 8) : 0,
            u = n.abs(e) + f,
            l = u / a),
            {
                destination: n.round(f),
                duration: l
            }
        }
        ;
        var u = o("transform");
        return r.extend(r, {
            hasTransform: u !== !1,
            hasPerspective: o("perspective")in i,
            hasTouch: "ontouchstart"in e,
            hasPointer: !!e.PointerEvent || !!e.MSPointerEvent,
            hasTransition: o("transition")in i
        }),
        r.isBadAndroid = function() {
            var t = e.navigator.appVersion;
            if (/Android/.test(t) && !/Chrome\/\d/.test(t)) {
                var n = t.match(/Safari\/(\d+.\d)/);
                return n && typeof n == "object" && n.length >= 2 ? parseFloat(n[1]) < 535.19 : !0
            }
            return !1
        }(),
        r.extend(r.style = {}, {
            transform: u,
            transitionTimingFunction: o("transitionTimingFunction"),
            transitionDuration: o("transitionDuration"),
            transitionDelay: o("transitionDelay"),
            transformOrigin: o("transformOrigin"),
            touchAction: o("touchAction")
        }),
        r.hasClass = function(e, t) {
            var n = new RegExp("(^|\\s)" + t + "(\\s|$)");
            return n.test(e.className)
        }
        ,
        r.addClass = function(e, t) {
            if (r.hasClass(e, t))
                return;
            var n = e.className.split(" ");
            n.push(t),
            e.className = n.join(" ")
        }
        ,
        r.removeClass = function(e, t) {
            if (!r.hasClass(e, t))
                return;
            var n = new RegExp("(^|\\s)" + t + "(\\s|$)","g");
            e.className = e.className.replace(n, " ")
        }
        ,
        r.offset = function(e) {
            var t = -e.offsetLeft
              , n = -e.offsetTop;
            while (e = e.offsetParent)
                t -= e.offsetLeft,
                n -= e.offsetTop;
            return {
                left: t,
                top: n
            }
        }
        ,
        r.preventDefaultException = function(e, t) {
            for (var n in t)
                if (t[n].test(e[n]))
                    return !0;
            return !1
        }
        ,
        r.extend(r.eventType = {}, {
            touchstart: 1,
            touchmove: 1,
            touchend: 1,
            mousedown: 2,
            mousemove: 2,
            mouseup: 2,
            pointerdown: 3,
            pointermove: 3,
            pointerup: 3,
            MSPointerDown: 3,
            MSPointerMove: 3,
            MSPointerUp: 3
        }),
        r.extend(r.ease = {}, {
            quadratic: {
                style: "cubic-bezier(0.25, 0.46, 0.45, 0.94)",
                fn: function(e) {
                    return e * (2 - e)
                }
            },
            circular: {
                style: "cubic-bezier(0.1, 0.57, 0.1, 1)",
                fn: function(e) {
                    return n.sqrt(1 - --e * e)
                }
            },
            back: {
                style: "cubic-bezier(0.175, 0.885, 0.32, 1.275)",
                fn: function(e) {
                    var t = 4;
                    return (e -= 1) * e * ((t + 1) * e + t) + 1
                }
            },
            bounce: {
                style: "",
                fn: function(e) {
                    return (e /= 1) < 1 / 2.75 ? 7.5625 * e * e : e < 2 / 2.75 ? 7.5625 * (e -= 1.5 / 2.75) * e + .75 : e < 2.5 / 2.75 ? 7.5625 * (e -= 2.25 / 2.75) * e + .9375 : 7.5625 * (e -= 2.625 / 2.75) * e + .984375
                }
            },
            elastic: {
                style: "",
                fn: function(e) {
                    var t = .22
                      , r = .4;
                    return e === 0 ? 0 : e == 1 ? 1 : r * n.pow(2, -10 * e) * n.sin((e - t / 4) * 2 * n.PI / t) + 1
                }
            }
        }),
        r.tap = function(e, n) {
            var r = t.createEvent("Event");
            r.initEvent(n, !0, !0),
            r.pageX = e.pageX,
            r.pageY = e.pageY,
            e.target.dispatchEvent(r)
        }
        ,
        r.click = function(n) {
            var r = n.target, i;
            /(SELECT|INPUT|TEXTAREA)/i.test(r.tagName) || (i = t.createEvent(e.MouseEvent ? "MouseEvents" : "Event"),
            i.initEvent("click", !0, !0),
            i.view = n.view || e,
            i.detail = 1,
            i.screenX = r.screenX || 0,
            i.screenY = r.screenY || 0,
            i.clientX = r.clientX || 0,
            i.clientY = r.clientY || 0,
            i.ctrlKey = !!n.ctrlKey,
            i.altKey = !!n.altKey,
            i.shiftKey = !!n.shiftKey,
            i.metaKey = !!n.metaKey,
            i.button = 0,
            i.relatedTarget = null,
            i._constructed = !0,
            r.dispatchEvent(i))
        }
        ,
        r.getTouchAction = function(e, t) {
            var n = "none";
            return e === "vertical" ? n = "pan-y" : e === "horizontal" && (n = "pan-x"),
            t && n != "none" && (n += " pinch-zoom"),
            n
        }
        ,
        r.getRect = function(e) {
            if (e instanceof SVGElement) {
                var t = e.getBoundingClientRect();
                return {
                    top: t.top,
                    left: t.left,
                    width: t.width,
                    height: t.height
                }
            }
            return {
                top: e.offsetTop,
                left: e.offsetLeft,
                width: e.offsetWidth,
                height: e.offsetHeight
            }
        }
        ,
        r
    }();
    s.prototype = {
        version: "5.2.0-snapshot",
        _init: function() {
            this._initEvents(),
            (this.options.scrollbars || this.options.indicators) && this._initIndicators(),
            this.options.mouseWheel && this._initWheel(),
            this.options.snap && this._initSnap(),
            this.options.keyBindings && this._initKeys()
        },
        destroy: function() {
            this._initEvents(!0),
            clearTimeout(this.resizeTimeout),
            this.resizeTimeout = null,
            this._execEvent("destroy")
        },
        _transitionEnd: function(e) {
            if (e.target != this.scroller || !this.isInTransition)
                return;
            this._transitionTime(),
            this.resetPosition(this.options.bounceTime) || (this.isInTransition = !1,
            this._execEvent("scrollEnd"))
        },
        _start: function(e) {
            if (i.eventType[e.type] != 1) {
                var t;
                e.which ? t = e.button : t = e.button < 2 ? 0 : e.button == 4 ? 1 : 2;
                if (t !== 0)
                    return
            }
            if (!this.enabled || this.initiated && i.eventType[e.type] !== this.initiated)
                return;
            this.options.preventDefault && !i.isBadAndroid && !i.preventDefaultException(e.target, this.options.preventDefaultException) && e.preventDefault();
            var r = e.touches ? e.touches[0] : e, s;
            this.initiated = i.eventType[e.type],
            this.moved = !1,
            this.distX = 0,
            this.distY = 0,
            this.directionX = 0,
            this.directionY = 0,
            this.directionLocked = 0,
            this.startTime = i.getTime(),
            this.options.useTransition && this.isInTransition ? (this._transitionTime(),
            this.isInTransition = !1,
            s = this.getComputedPosition(),
            this._translate(n.round(s.x), n.round(s.y)),
            this._execEvent("scrollEnd")) : !this.options.useTransition && this.isAnimating && (this.isAnimating = !1,
            this._execEvent("scrollEnd")),
            this.startX = this.x,
            this.startY = this.y,
            this.absStartX = this.x,
            this.absStartY = this.y,
            this.pointX = r.pageX,
            this.pointY = r.pageY,
            this._execEvent("beforeScrollStart")
        },
        _move: function(e) {
            if (!this.enabled || i.eventType[e.type] !== this.initiated)
                return;
            this.options.preventDefault && e.preventDefault();
            var t = e.touches ? e.touches[0] : e, r = t.pageX - this.pointX, s = t.pageY - this.pointY, o = i.getTime(), u, a, f, l;
            this.pointX = t.pageX,
            this.pointY = t.pageY,
            this.distX += r,
            this.distY += s,
            f = n.abs(this.distX),
            l = n.abs(this.distY);
            if (o - this.endTime > 300 && f < 10 && l < 10)
                return;
            !this.directionLocked && !this.options.freeScroll && (f > l + this.options.directionLockThreshold ? this.directionLocked = "h" : l >= f + this.options.directionLockThreshold ? this.directionLocked = "v" : this.directionLocked = "n");
            if (this.directionLocked == "h") {
                if (this.options.eventPassthrough == "vertical")
                    e.preventDefault();
                else if (this.options.eventPassthrough == "horizontal") {
                    this.initiated = !1;
                    return
                }
                s = 0
            } else if (this.directionLocked == "v") {
                if (this.options.eventPassthrough == "horizontal")
                    e.preventDefault();
                else if (this.options.eventPassthrough == "vertical") {
                    this.initiated = !1;
                    return
                }
                r = 0
            }
            r = this.hasHorizontalScroll ? r : 0,
            s = this.hasVerticalScroll ? s : 0,
            u = this.x + r,
            a = this.y + s;
            if (u > 0 || u < this.maxScrollX)
                u = this.options.bounce ? this.x + r / 3 : u > 0 ? 0 : this.maxScrollX;
            if (a > 0 || a < this.maxScrollY)
                a = this.options.bounce ? this.y + s / 3 : a > 0 ? 0 : this.maxScrollY;
            this.directionX = r > 0 ? -1 : r < 0 ? 1 : 0,
            this.directionY = s > 0 ? -1 : s < 0 ? 1 : 0,
            this.moved || this._execEvent("scrollStart"),
            this.moved = !0,
            this._translate(u, a),
            o - this.startTime > 300 && (this.startTime = o,
            this.startX = this.x,
            this.startY = this.y,
            this.options.probeType == 1 && this._execEvent("scroll")),
            this.options.probeType > 1 && this._execEvent("scroll")
        },
        _end: function(e) {
            if (!this.enabled || i.eventType[e.type] !== this.initiated)
                return;
            this.options.preventDefault && !i.preventDefaultException(e.target, this.options.preventDefaultException) && e.preventDefault();
            var t = e.changedTouches ? e.changedTouches[0] : e, r, s, o = i.getTime() - this.startTime, u = n.round(this.x), a = n.round(this.y), f = n.abs(u - this.startX), l = n.abs(a - this.startY), c = 0, h = "";
            this.isInTransition = 0,
            this.initiated = 0,
            this.endTime = i.getTime();
            if (this.resetPosition(this.options.bounceTime))
                return;
            this.scrollTo(u, a);
            if (!this.moved) {
                this.options.tap && i.tap(e, this.options.tap),
                this.options.click && i.click(e),
                this._execEvent("scrollCancel");
                return
            }
            if (this._events.flick && o < 200 && f < 100 && l < 100) {
                this._execEvent("flick");
                return
            }
            this.options.momentum && o < 300 && (r = this.hasHorizontalScroll ? i.momentum(this.x, this.startX, o, this.maxScrollX, this.options.bounce ? this.wrapperWidth : 0, this.options.deceleration) : {
                destination: u,
                duration: 0
            },
            s = this.hasVerticalScroll ? i.momentum(this.y, this.startY, o, this.maxScrollY, this.options.bounce ? this.wrapperHeight : 0, this.options.deceleration) : {
                destination: a,
                duration: 0
            },
            u = r.destination,
            a = s.destination,
            c = n.max(r.duration, s.duration),
            this.isInTransition = 1);
            if (this.options.snap) {
                var p = this._nearestSnap(u, a);
                this.currentPage = p,
                c = this.options.snapSpeed || n.max(n.max(n.min(n.abs(u - p.x), 1e3), n.min(n.abs(a - p.y), 1e3)), 300),
                u = p.x,
                a = p.y,
                this.directionX = 0,
                this.directionY = 0,
                h = this.options.bounceEasing
            }
            if (u != this.x || a != this.y) {
                if (u > 0 || u < this.maxScrollX || a > 0 || a < this.maxScrollY)
                    h = i.ease.quadratic;
                this.scrollTo(u, a, c, h);
                return
            }
            this._execEvent("scrollEnd")
        },
        _resize: function() {
            var e = this;
            clearTimeout(this.resizeTimeout),
            this.resizeTimeout = setTimeout(function() {
                e.refresh()
            }, this.options.resizePolling)
        },
        resetPosition: function(e) {
            var t = this.x
              , n = this.y;
            return e = e || 0,
            !this.hasHorizontalScroll || this.x > 0 ? t = 0 : this.x < this.maxScrollX && (t = this.maxScrollX),
            !this.hasVerticalScroll || this.y > 0 ? n = 0 : this.y < this.maxScrollY && (n = this.maxScrollY),
            t == this.x && n == this.y ? !1 : (this.scrollTo(t, n, e, this.options.bounceEasing),
            !0)
        },
        disable: function() {
            this.enabled = !1
        },
        enable: function() {
            this.enabled = !0
        },
        refresh: function() {
            i.getRect(this.wrapper),
            this.wrapperWidth = this.wrapper.clientWidth,
            this.wrapperHeight = this.wrapper.clientHeight;
            var e = i.getRect(this.scroller);
            this.scrollerWidth = e.width,
            this.scrollerHeight = e.height,
            this.maxScrollX = this.wrapperWidth - this.scrollerWidth,
            this.maxScrollY = this.wrapperHeight - this.scrollerHeight,
            this.hasHorizontalScroll = this.options.scrollX && this.maxScrollX < 0,
            this.hasVerticalScroll = this.options.scrollY && this.maxScrollY < 0,
            this.hasHorizontalScroll || (this.maxScrollX = 0,
            this.scrollerWidth = this.wrapperWidth),
            this.hasVerticalScroll || (this.maxScrollY = 0,
            this.scrollerHeight = this.wrapperHeight),
            this.endTime = 0,
            this.directionX = 0,
            this.directionY = 0,
            i.hasPointer && !this.options.disablePointer && (this.wrapper.style[i.style.touchAction] = i.getTouchAction(this.options.eventPassthrough, !0),
            this.wrapper.style[i.style.touchAction] || (this.wrapper.style[i.style.touchAction] = i.getTouchAction(this.options.eventPassthrough, !1))),
            this.wrapperOffset = i.offset(this.wrapper),
            this._execEvent("refresh"),
            this.resetPosition()
        },
        on: function(e, t) {
            this._events[e] || (this._events[e] = []),
            this._events[e].push(t)
        },
        off: function(e, t) {
            if (!this._events[e])
                return;
            var n = this._events[e].indexOf(t);
            n > -1 && this._events[e].splice(n, 1)
        },
        _execEvent: function(e) {
            if (!this._events[e])
                return;
            var t = 0
              , n = this._events[e].length;
            if (!n)
                return;
            for (; t < n; t++)
                this._events[e][t].apply(this, [].slice.call(arguments, 1))
        },
        scrollBy: function(e, t, n, r) {
            e = this.x + e,
            t = this.y + t,
            n = n || 0,
            this.scrollTo(e, t, n, r)
        },
        scrollTo: function(e, t, n, r) {
            r = r || i.ease.circular,
            this.isInTransition = this.options.useTransition && n > 0;
            var s = this.options.useTransition && r.style;
            !n || s ? (s && (this._transitionTimingFunction(r.style),
            this._transitionTime(n)),
            this._translate(e, t)) : this._animate(e, t, n, r.fn)
        },
        scrollToElement: function(e, t, r, s, o) {
            e = e.nodeType ? e : this.scroller.querySelector(e);
            if (!e)
                return;
            var u = i.offset(e);
            u.left -= this.wrapperOffset.left,
            u.top -= this.wrapperOffset.top;
            var a = i.getRect(e)
              , f = i.getRect(this.wrapper);
            r === !0 && (r = n.round(a.width / 2 - f.width / 2)),
            s === !0 && (s = n.round(a.height / 2 - f.height / 2)),
            u.left -= r || 0,
            u.top -= s || 0,
            u.left = u.left > 0 ? 0 : u.left < this.maxScrollX ? this.maxScrollX : u.left,
            u.top = u.top > 0 ? 0 : u.top < this.maxScrollY ? this.maxScrollY : u.top,
            t = t === undefined || t === null || t === "auto" ? n.max(n.abs(this.x - u.left), n.abs(this.y - u.top)) : t,
            this.scrollTo(u.left, u.top, t, o)
        },
        _transitionTime: function(e) {
            if (!this.options.useTransition)
                return;
            e = e || 0;
            var t = i.style.transitionDuration;
            if (!t)
                return;
            this.scrollerStyle[t] = e + "ms";
            if (!e && i.isBadAndroid) {
                this.scrollerStyle[t] = "0.0001ms";
                var n = this;
                r(function() {
                    n.scrollerStyle[t] === "0.0001ms" && (n.scrollerStyle[t] = "0s")
                })
            }
            if (this.indicators)
                for (var s = this.indicators.length; s--; )
                    this.indicators[s].transitionTime(e)
        },
        _transitionTimingFunction: function(e) {
            this.scrollerStyle[i.style.transitionTimingFunction] = e;
            if (this.indicators)
                for (var t = this.indicators.length; t--; )
                    this.indicators[t].transitionTimingFunction(e)
        },
        _translate: function(e, t) {
            this.options.useTransform ? this.scrollerStyle[i.style.transform] = "translate(" + e + "px," + t + "px)" + this.translateZ : (e = n.round(e),
            t = n.round(t),
            this.scrollerStyle.left = e + "px",
            this.scrollerStyle.top = t + "px"),
            this.x = e,
            this.y = t;
            if (this.indicators)
                for (var r = this.indicators.length; r--; )
                    this.indicators[r].updatePosition()
        },
        _initEvents: function(t) {
            var n = t ? i.removeEvent : i.addEvent
              , r = this.options.bindToWrapper ? this.wrapper : e;
            n(e, "orientationchange", this),
            n(e, "resize", this),
            this.options.click && n(this.wrapper, "click", this, !0),
            this.options.disableMouse || (n(this.wrapper, "mousedown", this),
            n(r, "mousemove", this),
            n(r, "mousecancel", this),
            n(r, "mouseup", this)),
            i.hasPointer && !this.options.disablePointer && (n(this.wrapper, i.prefixPointerEvent("pointerdown"), this),
            n(r, i.prefixPointerEvent("pointermove"), this),
            n(r, i.prefixPointerEvent("pointercancel"), this),
            n(r, i.prefixPointerEvent("pointerup"), this)),
            i.hasTouch && !this.options.disableTouch && (n(this.wrapper, "touchstart", this),
            n(r, "touchmove", this),
            n(r, "touchcancel", this),
            n(r, "touchend", this)),
            n(this.scroller, "transitionend", this),
            n(this.scroller, "webkitTransitionEnd", this),
            n(this.scroller, "oTransitionEnd", this),
            n(this.scroller, "MSTransitionEnd", this)
        },
        getComputedPosition: function() {
            var t = e.getComputedStyle(this.scroller, null), n, r;
            return this.options.useTransform ? (t = t[i.style.transform].split(")")[0].split(", "),
            n = +(t[12] || t[4]),
            r = +(t[13] || t[5])) : (n = +t.left.replace(/[^-\d.]/g, ""),
            r = +t.top.replace(/[^-\d.]/g, "")),
            {
                x: n,
                y: r
            }
        },
        _initIndicators: function() {
            function a(e) {
                if (i.indicators)
                    for (var t = i.indicators.length; t--; )
                        e.call(i.indicators[t])
            }
            var e = this.options.interactiveScrollbars, t = typeof this.options.scrollbars != "string", n = [], r, i = this;
            this.indicators = [],
            this.options.scrollbars && (this.options.scrollY && (r = {
                el: o("v", e, this.options.scrollbars),
                interactive: e,
                defaultScrollbars: !0,
                customStyle: t,
                resize: this.options.resizeScrollbars,
                shrink: this.options.shrinkScrollbars,
                fade: this.options.fadeScrollbars,
                listenX: !1
            },
            this.wrapper.appendChild(r.el),
            n.push(r)),
            this.options.scrollX && (r = {
                el: o("h", e, this.options.scrollbars),
                interactive: e,
                defaultScrollbars: !0,
                customStyle: t,
                resize: this.options.resizeScrollbars,
                shrink: this.options.shrinkScrollbars,
                fade: this.options.fadeScrollbars,
                listenY: !1
            },
            this.wrapper.appendChild(r.el),
            n.push(r))),
            this.options.indicators && (n = n.concat(this.options.indicators));
            for (var s = n.length; s--; )
                this.indicators.push(new u(this,n[s]));
            this.options.fadeScrollbars && (this.on("scrollEnd", function() {
                a(function() {
                    this.fade()
                })
            }),
            this.on("scrollCancel", function() {
                a(function() {
                    this.fade()
                })
            }),
            this.on("scrollStart", function() {
                a(function() {
                    this.fade(1)
                })
            }),
            this.on("beforeScrollStart", function() {
                a(function() {
                    this.fade(1, !0)
                })
            })),
            this.on("refresh", function() {
                a(function() {
                    this.refresh()
                })
            }),
            this.on("destroy", function() {
                a(function() {
                    this.destroy()
                }),
                delete this.indicators
            })
        },
        _initWheel: function() {
            i.addEvent(this.wrapper, "wheel", this),
            i.addEvent(this.wrapper, "mousewheel", this),
            i.addEvent(this.wrapper, "DOMMouseScroll", this),
            this.on("destroy", function() {
                clearTimeout(this.wheelTimeout),
                this.wheelTimeout = null,
                i.removeEvent(this.wrapper, "wheel", this),
                i.removeEvent(this.wrapper, "mousewheel", this),
                i.removeEvent(this.wrapper, "DOMMouseScroll", this)
            })
        },
        _wheel: function(e) {
            if (!this.enabled)
                return;
            e.preventDefault();
            var t, r, i, s, o = this;
            this.wheelTimeout === undefined && o._execEvent("scrollStart"),
            clearTimeout(this.wheelTimeout),
            this.wheelTimeout = setTimeout(function() {
                o.options.snap || o._execEvent("scrollEnd"),
                o.wheelTimeout = undefined
            }, 400);
            if ("deltaX"in e)
                e.deltaMode === 1 ? (t = -e.deltaX * this.options.mouseWheelSpeed,
                r = -e.deltaY * this.options.mouseWheelSpeed) : (t = -e.deltaX,
                r = -e.deltaY);
            else if ("wheelDeltaX"in e)
                t = e.wheelDeltaX / 120 * this.options.mouseWheelSpeed,
                r = e.wheelDeltaY / 120 * this.options.mouseWheelSpeed;
            else if ("wheelDelta"in e)
                t = r = e.wheelDelta / 120 * this.options.mouseWheelSpeed;
            else {
                if (!("detail"in e))
                    return;
                t = r = -e.detail / 3 * this.options.mouseWheelSpeed
            }
            t *= this.options.invertWheelDirection,
            r *= this.options.invertWheelDirection,
            this.hasVerticalScroll || (t = r,
            r = 0);
            if (this.options.snap) {
                i = this.currentPage.pageX,
                s = this.currentPage.pageY,
                t > 0 ? i-- : t < 0 && i++,
                r > 0 ? s-- : r < 0 && s++,
                this.goToPage(i, s);
                return
            }
            i = this.x + n.round(this.hasHorizontalScroll ? t : 0),
            s = this.y + n.round(this.hasVerticalScroll ? r : 0),
            this.directionX = t > 0 ? -1 : t < 0 ? 1 : 0,
            this.directionY = r > 0 ? -1 : r < 0 ? 1 : 0,
            i > 0 ? i = 0 : i < this.maxScrollX && (i = this.maxScrollX),
            s > 0 ? s = 0 : s < this.maxScrollY && (s = this.maxScrollY),
            this.scrollTo(i, s, 0),
            this.options.probeType > 1 && this._execEvent("scroll")
        },
        _initSnap: function() {
            this.currentPage = {},
            typeof this.options.snap == "string" && (this.options.snap = this.scroller.querySelectorAll(this.options.snap)),
            this.on("refresh", function() {
                var e = 0, t, r = 0, s, o, u, a = 0, f, l = this.options.snapStepX || this.wrapperWidth, c = this.options.snapStepY || this.wrapperHeight, h, p;
                this.pages = [];
                if (!this.wrapperWidth || !this.wrapperHeight || !this.scrollerWidth || !this.scrollerHeight)
                    return;
                if (this.options.snap === !0) {
                    o = n.round(l / 2),
                    u = n.round(c / 2);
                    while (a > -this.scrollerWidth) {
                        this.pages[e] = [],
                        t = 0,
                        f = 0;
                        while (f > -this.scrollerHeight)
                            this.pages[e][t] = {
                                x: n.max(a, this.maxScrollX),
                                y: n.max(f, this.maxScrollY),
                                width: l,
                                height: c,
                                cx: a - o,
                                cy: f - u
                            },
                            f -= c,
                            t++;
                        a -= l,
                        e++
                    }
                } else {
                    h = this.options.snap,
                    t = h.length,
                    s = -1;
                    for (; e < t; e++) {
                        p = i.getRect(h[e]);
                        if (e === 0 || p.left <= i.getRect(h[e - 1]).left)
                            r = 0,
                            s++;
                        this.pages[r] || (this.pages[r] = []),
                        a = n.max(-p.left, this.maxScrollX),
                        f = n.max(-p.top, this.maxScrollY),
                        o = a - n.round(p.width / 2),
                        u = f - n.round(p.height / 2),
                        this.pages[r][s] = {
                            x: a,
                            y: f,
                            width: p.width,
                            height: p.height,
                            cx: o,
                            cy: u
                        },
                        a > this.maxScrollX && r++
                    }
                }
                this.goToPage(this.currentPage.pageX || 0, this.currentPage.pageY || 0, 0),
                this.options.snapThreshold % 1 === 0 ? (this.snapThresholdX = this.options.snapThreshold,
                this.snapThresholdY = this.options.snapThreshold) : (this.snapThresholdX = n.round(this.pages[this.currentPage.pageX][this.currentPage.pageY].width * this.options.snapThreshold),
                this.snapThresholdY = n.round(this.pages[this.currentPage.pageX][this.currentPage.pageY].height * this.options.snapThreshold))
            }),
            this.on("flick", function() {
                var e = this.options.snapSpeed || n.max(n.max(n.min(n.abs(this.x - this.startX), 1e3), n.min(n.abs(this.y - this.startY), 1e3)), 300);
                this.goToPage(this.currentPage.pageX + this.directionX, this.currentPage.pageY + this.directionY, e)
            })
        },
        _nearestSnap: function(e, t) {
            if (!this.pages.length)
                return {
                    x: 0,
                    y: 0,
                    pageX: 0,
                    pageY: 0
                };
            var r = 0
              , i = this.pages.length
              , s = 0;
            if (n.abs(e - this.absStartX) < this.snapThresholdX && n.abs(t - this.absStartY) < this.snapThresholdY)
                return this.currentPage;
            e > 0 ? e = 0 : e < this.maxScrollX && (e = this.maxScrollX),
            t > 0 ? t = 0 : t < this.maxScrollY && (t = this.maxScrollY);
            for (; r < i; r++)
                if (e >= this.pages[r][0].cx) {
                    e = this.pages[r][0].x;
                    break
                }
            i = this.pages[r].length;
            for (; s < i; s++)
                if (t >= this.pages[0][s].cy) {
                    t = this.pages[0][s].y;
                    break
                }
            return r == this.currentPage.pageX && (r += this.directionX,
            r < 0 ? r = 0 : r >= this.pages.length && (r = this.pages.length - 1),
            e = this.pages[r][0].x),
            s == this.currentPage.pageY && (s += this.directionY,
            s < 0 ? s = 0 : s >= this.pages[0].length && (s = this.pages[0].length - 1),
            t = this.pages[0][s].y),
            {
                x: e,
                y: t,
                pageX: r,
                pageY: s
            }
        },
        goToPage: function(e, t, r, i) {
            i = i || this.options.bounceEasing,
            e >= this.pages.length ? e = this.pages.length - 1 : e < 0 && (e = 0),
            t >= this.pages[e].length ? t = this.pages[e].length - 1 : t < 0 && (t = 0);
            var s = this.pages[e][t].x
              , o = this.pages[e][t].y;
            r = r === undefined ? this.options.snapSpeed || n.max(n.max(n.min(n.abs(s - this.x), 1e3), n.min(n.abs(o - this.y), 1e3)), 300) : r,
            this.currentPage = {
                x: s,
                y: o,
                pageX: e,
                pageY: t
            },
            this.scrollTo(s, o, r, i)
        },
        next: function(e, t) {
            var n = this.currentPage.pageX
              , r = this.currentPage.pageY;
            n++,
            n >= this.pages.length && this.hasVerticalScroll && (n = 0,
            r++),
            this.goToPage(n, r, e, t)
        },
        prev: function(e, t) {
            var n = this.currentPage.pageX
              , r = this.currentPage.pageY;
            n--,
            n < 0 && this.hasVerticalScroll && (n = 0,
            r--),
            this.goToPage(n, r, e, t)
        },
        _initKeys: function(t) {
            var n = {
                pageUp: 33,
                pageDown: 34,
                end: 35,
                home: 36,
                left: 37,
                up: 38,
                right: 39,
                down: 40
            }, r;
            if (typeof this.options.keyBindings == "object")
                for (r in this.options.keyBindings)
                    typeof this.options.keyBindings[r] == "string" && (this.options.keyBindings[r] = this.options.keyBindings[r].toUpperCase().charCodeAt(0));
            else
                this.options.keyBindings = {};
            for (r in n)
                this.options.keyBindings[r] = this.options.keyBindings[r] || n[r];
            i.addEvent(e, "keydown", this),
            this.on("destroy", function() {
                i.removeEvent(e, "keydown", this)
            })
        },
        _key: function(e) {
            if (!this.enabled)
                return;
            var t = this.options.snap, r = t ? this.currentPage.pageX : this.x, s = t ? this.currentPage.pageY : this.y, o = i.getTime(), u = this.keyTime || 0, a = .25, f;
            this.options.useTransition && this.isInTransition && (f = this.getComputedPosition(),
            this._translate(n.round(f.x), n.round(f.y)),
            this.isInTransition = !1),
            this.keyAcceleration = o - u < 200 ? n.min(this.keyAcceleration + a, 50) : 0;
            switch (e.keyCode) {
            case this.options.keyBindings.pageUp:
                this.hasHorizontalScroll && !this.hasVerticalScroll ? r += t ? 1 : this.wrapperWidth : s += t ? 1 : this.wrapperHeight;
                break;
            case this.options.keyBindings.pageDown:
                this.hasHorizontalScroll && !this.hasVerticalScroll ? r -= t ? 1 : this.wrapperWidth : s -= t ? 1 : this.wrapperHeight;
                break;
            case this.options.keyBindings.end:
                r = t ? this.pages.length - 1 : this.maxScrollX,
                s = t ? this.pages[0].length - 1 : this.maxScrollY;
                break;
            case this.options.keyBindings.home:
                r = 0,
                s = 0;
                break;
            case this.options.keyBindings.left:
                r += t ? -1 : 5 + this.keyAcceleration >> 0;
                break;
            case this.options.keyBindings.up:
                s += t ? 1 : 5 + this.keyAcceleration >> 0;
                break;
            case this.options.keyBindings.right:
                r -= t ? -1 : 5 + this.keyAcceleration >> 0;
                break;
            case this.options.keyBindings.down:
                s -= t ? 1 : 5 + this.keyAcceleration >> 0;
                break;
            default:
                return
            }
            if (t) {
                this.goToPage(r, s);
                return
            }
            r > 0 ? (r = 0,
            this.keyAcceleration = 0) : r < this.maxScrollX && (r = this.maxScrollX,
            this.keyAcceleration = 0),
            s > 0 ? (s = 0,
            this.keyAcceleration = 0) : s < this.maxScrollY && (s = this.maxScrollY,
            this.keyAcceleration = 0),
            this.scrollTo(r, s, 0),
            this.keyTime = o
        },
        _animate: function(e, t, n, s) {
            function c() {
                var h = i.getTime(), p, d, v;
                if (h >= l) {
                    o.isAnimating = !1,
                    o._translate(e, t),
                    o.resetPosition(o.options.bounceTime) || o._execEvent("scrollEnd");
                    return
                }
                h = (h - f) / n,
                v = s(h),
                p = (e - u) * v + u,
                d = (t - a) * v + a,
                o._translate(p, d),
                o.isAnimating && r(c),
                o.options.probeType == 3 && o._execEvent("scroll")
            }
            var o = this
              , u = this.x
              , a = this.y
              , f = i.getTime()
              , l = f + n;
            this.isAnimating = !0,
            c()
        },
        handleEvent: function(e) {
            switch (e.type) {
            case "touchstart":
            case "pointerdown":
            case "MSPointerDown":
            case "mousedown":
                this._start(e);
                break;
            case "touchmove":
            case "pointermove":
            case "MSPointerMove":
            case "mousemove":
                this._move(e);
                break;
            case "touchend":
            case "pointerup":
            case "MSPointerUp":
            case "mouseup":
            case "touchcancel":
            case "pointercancel":
            case "MSPointerCancel":
            case "mousecancel":
                this._end(e);
                break;
            case "orientationchange":
            case "resize":
                this._resize();
                break;
            case "transitionend":
            case "webkitTransitionEnd":
            case "oTransitionEnd":
            case "MSTransitionEnd":
                this._transitionEnd(e);
                break;
            case "wheel":
            case "DOMMouseScroll":
            case "mousewheel":
                this._wheel(e);
                break;
            case "keydown":
                this._key(e);
                break;
            case "click":
                this.enabled && !e._constructed && (e.preventDefault(),
                e.stopPropagation())
            }
        }
    },
    u.prototype = {
        handleEvent: function(e) {
            switch (e.type) {
            case "touchstart":
            case "pointerdown":
            case "MSPointerDown":
            case "mousedown":
                this._start(e);
                break;
            case "touchmove":
            case "pointermove":
            case "MSPointerMove":
            case "mousemove":
                this._move(e);
                break;
            case "touchend":
            case "pointerup":
            case "MSPointerUp":
            case "mouseup":
            case "touchcancel":
            case "pointercancel":
            case "MSPointerCancel":
            case "mousecancel":
                this._end(e)
            }
        },
        destroy: function() {
            this.options.fadeScrollbars && (clearTimeout(this.fadeTimeout),
            this.fadeTimeout = null),
            this.options.interactive && (i.removeEvent(this.indicator, "touchstart", this),
            i.removeEvent(this.indicator, i.prefixPointerEvent("pointerdown"), this),
            i.removeEvent(this.indicator, "mousedown", this),
            i.removeEvent(e, "touchmove", this),
            i.removeEvent(e, i.prefixPointerEvent("pointermove"), this),
            i.removeEvent(e, "mousemove", this),
            i.removeEvent(e, "touchend", this),
            i.removeEvent(e, i.prefixPointerEvent("pointerup"), this),
            i.removeEvent(e, "mouseup", this)),
            this.options.defaultScrollbars && this.wrapper.parentNode && this.wrapper.parentNode.removeChild(this.wrapper)
        },
        _start: function(t) {
            var n = t.touches ? t.touches[0] : t;
            t.preventDefault(),
            t.stopPropagation(),
            this.transitionTime(),
            this.initiated = !0,
            this.moved = !1,
            this.lastPointX = n.pageX,
            this.lastPointY = n.pageY,
            this.startTime = i.getTime(),
            this.options.disableTouch || i.addEvent(e, "touchmove", this),
            this.options.disablePointer || i.addEvent(e, i.prefixPointerEvent("pointermove"), this),
            this.options.disableMouse || i.addEvent(e, "mousemove", this),
            this.scroller._execEvent("beforeScrollStart")
        },
        _move: function(e) {
            var t = e.touches ? e.touches[0] : e, n, r, s, o, u = i.getTime();
            this.moved || this.scroller._execEvent("scrollStart"),
            this.moved = !0,
            n = t.pageX - this.lastPointX,
            this.lastPointX = t.pageX,
            r = t.pageY - this.lastPointY,
            this.lastPointY = t.pageY,
            s = this.x + n,
            o = this.y + r,
            this._pos(s, o),
            this.scroller.options.probeType == 1 && u - this.startTime > 300 ? (this.startTime = u,
            this.scroller._execEvent("scroll")) : this.scroller.options.probeType > 1 && this.scroller._execEvent("scroll"),
            e.preventDefault(),
            e.stopPropagation()
        },
        _end: function(t) {
            if (!this.initiated)
                return;
            this.initiated = !1,
            t.preventDefault(),
            t.stopPropagation(),
            i.removeEvent(e, "touchmove", this),
            i.removeEvent(e, i.prefixPointerEvent("pointermove"), this),
            i.removeEvent(e, "mousemove", this);
            if (this.scroller.options.snap) {
                var r = this.scroller._nearestSnap(this.scroller.x, this.scroller.y)
                  , s = this.options.snapSpeed || n.max(n.max(n.min(n.abs(this.scroller.x - r.x), 1e3), n.min(n.abs(this.scroller.y - r.y), 1e3)), 300);
                if (this.scroller.x != r.x || this.scroller.y != r.y)
                    this.scroller.directionX = 0,
                    this.scroller.directionY = 0,
                    this.scroller.currentPage = r,
                    this.scroller.scrollTo(r.x, r.y, s, this.scroller.options.bounceEasing)
            }
            this.moved && this.scroller._execEvent("scrollEnd")
        },
        transitionTime: function(e) {
            e = e || 0;
            var t = i.style.transitionDuration;
            if (!t)
                return;
            this.indicatorStyle[t] = e + "ms";
            if (!e && i.isBadAndroid) {
                this.indicatorStyle[t] = "0.0001ms";
                var n = this;
                r(function() {
                    n.indicatorStyle[t] === "0.0001ms" && (n.indicatorStyle[t] = "0s")
                })
            }
        },
        transitionTimingFunction: function(e) {
            this.indicatorStyle[i.style.transitionTimingFunction] = e
        },
        refresh: function() {
            this.transitionTime(),
            this.options.listenX && !this.options.listenY ? this.indicatorStyle.display = this.scroller.hasHorizontalScroll ? "block" : "none" : this.options.listenY && !this.options.listenX ? this.indicatorStyle.display = this.scroller.hasVerticalScroll ? "block" : "none" : this.indicatorStyle.display = this.scroller.hasHorizontalScroll || this.scroller.hasVerticalScroll ? "block" : "none",
            this.scroller.hasHorizontalScroll && this.scroller.hasVerticalScroll ? (i.addClass(this.wrapper, "iScrollBothScrollbars"),
            i.removeClass(this.wrapper, "iScrollLoneScrollbar"),
            this.options.defaultScrollbars && this.options.customStyle && (this.options.listenX ? this.wrapper.style.right = "8px" : this.wrapper.style.bottom = "8px")) : (i.removeClass(this.wrapper, "iScrollBothScrollbars"),
            i.addClass(this.wrapper, "iScrollLoneScrollbar"),
            this.options.defaultScrollbars && this.options.customStyle && (this.options.listenX ? this.wrapper.style.right = "2px" : this.wrapper.style.bottom = "2px")),
            i.getRect(this.wrapper),
            this.options.listenX && (this.wrapperWidth = this.wrapper.clientWidth,
            this.options.resize ? (this.indicatorWidth = n.max(n.round(this.wrapperWidth * this.wrapperWidth / (this.scroller.scrollerWidth || this.wrapperWidth || 1)), 8),
            this.indicatorStyle.width = this.indicatorWidth + "px") : this.indicatorWidth = this.indicator.clientWidth,
            this.maxPosX = this.wrapperWidth - this.indicatorWidth,
            this.options.shrink == "clip" ? (this.minBoundaryX = -this.indicatorWidth + 8,
            this.maxBoundaryX = this.wrapperWidth - 8) : (this.minBoundaryX = 0,
            this.maxBoundaryX = this.maxPosX),
            this.sizeRatioX = this.options.speedRatioX || this.scroller.maxScrollX && this.maxPosX / this.scroller.maxScrollX),
            this.options.listenY && (this.wrapperHeight = this.wrapper.clientHeight,
            this.options.resize ? (this.indicatorHeight = n.max(n.round(this.wrapperHeight * this.wrapperHeight / (this.scroller.scrollerHeight || this.wrapperHeight || 1)), 8),
            this.indicatorStyle.height = this.indicatorHeight + "px") : this.indicatorHeight = this.indicator.clientHeight,
            this.maxPosY = this.wrapperHeight - this.indicatorHeight,
            this.options.shrink == "clip" ? (this.minBoundaryY = -this.indicatorHeight + 8,
            this.maxBoundaryY = this.wrapperHeight - 8) : (this.minBoundaryY = 0,
            this.maxBoundaryY = this.maxPosY),
            this.maxPosY = this.wrapperHeight - this.indicatorHeight,
            this.sizeRatioY = this.options.speedRatioY || this.scroller.maxScrollY && this.maxPosY / this.scroller.maxScrollY),
            this.updatePosition()
        },
        updatePosition: function() {
            var e = this.options.listenX && n.round(this.sizeRatioX * this.scroller.x) || 0
              , t = this.options.listenY && n.round(this.sizeRatioY * this.scroller.y) || 0;
            this.options.ignoreBoundaries || (e < this.minBoundaryX ? (this.options.shrink == "scale" && (this.width = n.max(this.indicatorWidth + e, 8),
            this.indicatorStyle.width = this.width + "px"),
            e = this.minBoundaryX) : e > this.maxBoundaryX ? this.options.shrink == "scale" ? (this.width = n.max(this.indicatorWidth - (e - this.maxPosX), 8),
            this.indicatorStyle.width = this.width + "px",
            e = this.maxPosX + this.indicatorWidth - this.width) : e = this.maxBoundaryX : this.options.shrink == "scale" && this.width != this.indicatorWidth && (this.width = this.indicatorWidth,
            this.indicatorStyle.width = this.width + "px"),
            t < this.minBoundaryY ? (this.options.shrink == "scale" && (this.height = n.max(this.indicatorHeight + t * 3, 8),
            this.indicatorStyle.height = this.height + "px"),
            t = this.minBoundaryY) : t > this.maxBoundaryY ? this.options.shrink == "scale" ? (this.height = n.max(this.indicatorHeight - (t - this.maxPosY) * 3, 8),
            this.indicatorStyle.height = this.height + "px",
            t = this.maxPosY + this.indicatorHeight - this.height) : t = this.maxBoundaryY : this.options.shrink == "scale" && this.height != this.indicatorHeight && (this.height = this.indicatorHeight,
            this.indicatorStyle.height = this.height + "px")),
            this.x = e,
            this.y = t,
            this.scroller.options.useTransform ? this.indicatorStyle[i.style.transform] = "translate(" + e + "px," + t + "px)" + this.scroller.translateZ : (this.indicatorStyle.left = e + "px",
            this.indicatorStyle.top = t + "px")
        },
        _pos: function(e, t) {
            e < 0 ? e = 0 : e > this.maxPosX && (e = this.maxPosX),
            t < 0 ? t = 0 : t > this.maxPosY && (t = this.maxPosY),
            e = this.options.listenX ? n.round(e / this.sizeRatioX) : this.scroller.x,
            t = this.options.listenY ? n.round(t / this.sizeRatioY) : this.scroller.y,
            this.scroller.scrollTo(e, t)
        },
        fade: function(e, t) {
            if (t && !this.visible)
                return;
            clearTimeout(this.fadeTimeout),
            this.fadeTimeout = null;
            var n = e ? 250 : 500
              , r = e ? 0 : 300;
            e = e ? "1" : "0",
            this.wrapperStyle[i.style.transitionDuration] = n + "ms",
            this.fadeTimeout = setTimeout(function(e) {
                this.wrapperStyle.opacity = e,
                this.visible = +e
            }
            .bind(this, e), r)
        }
    },
    s.utils = i,
    typeof module != "undefined" && module.exports ? module.exports = s : typeof define == "function" && define.amd ? define(function() {
        return s
    }) : e.IScroll = s
}
)(window, document, Math);
(function(t, n) {
    typeof exports == "object" && typeof module == "object" ? module.exports = n() : typeof define == "function" && define.amd ? define(n) : typeof exports == "object" ? exports.Handlebars = n() : t.Handlebars = n()
}
)(this, function() {
    return function(e) {
        function n(r) {
            if (t[r])
                return t[r].exports;
            var i = t[r] = {
                exports: {},
                id: r,
                loaded: !1
            };
            return e[r].call(i.exports, i, i.exports, n),
            i.loaded = !0,
            i.exports
        }
        var t = {};
        return n.m = e,
        n.c = t,
        n.p = "",
        n(0)
    }([function(e, t, n) {
        "use strict";
        function g() {
            var e = m();
            return e.compile = function(t, n) {
                return f.compile(t, n, e)
            }
            ,
            e.precompile = function(t, n) {
                return f.precompile(t, n, e)
            }
            ,
            e.AST = u["default"],
            e.Compiler = f.Compiler,
            e.JavaScriptCompiler = c["default"],
            e.Parser = a.parser,
            e.parse = a.parse,
            e
        }
        var r = n(8)["default"];
        t.__esModule = !0;
        var i = n(1)
          , s = r(i)
          , o = n(2)
          , u = r(o)
          , a = n(3)
          , f = n(4)
          , l = n(5)
          , c = r(l)
          , h = n(6)
          , p = r(h)
          , d = n(7)
          , v = r(d)
          , m = s["default"].create
          , y = g();
        y.create = g,
        v["default"](y),
        y.Visitor = p["default"],
        y["default"] = y,
        t["default"] = y,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function g() {
            var e = new o.HandlebarsEnvironment;
            return h.extend(e, o),
            e.SafeString = a["default"],
            e.Exception = l["default"],
            e.Utils = h,
            e.escapeExpression = h.escapeExpression,
            e.VM = d,
            e.template = function(t) {
                return d.template(t, e)
            }
            ,
            e
        }
        var r = n(9)["default"]
          , i = n(8)["default"];
        t.__esModule = !0;
        var s = n(10)
          , o = r(s)
          , u = n(11)
          , a = i(u)
          , f = n(12)
          , l = i(f)
          , c = n(13)
          , h = r(c)
          , p = n(14)
          , d = r(p)
          , v = n(7)
          , m = i(v)
          , y = g();
        y.create = g,
        m["default"](y),
        y["default"] = y,
        t["default"] = y,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = {
            Program: function(t, n, r, i) {
                this.loc = i,
                this.type = "Program",
                this.body = t,
                this.blockParams = n,
                this.strip = r
            },
            MustacheStatement: function(t, n, r, i, s, o) {
                this.loc = o,
                this.type = "MustacheStatement",
                this.path = t,
                this.params = n || [],
                this.hash = r,
                this.escaped = i,
                this.strip = s
            },
            BlockStatement: function(t, n, r, i, s, o, u, a, f) {
                this.loc = f,
                this.type = "BlockStatement",
                this.path = t,
                this.params = n || [],
                this.hash = r,
                this.program = i,
                this.inverse = s,
                this.openStrip = o,
                this.inverseStrip = u,
                this.closeStrip = a
            },
            PartialStatement: function(t, n, r, i, s) {
                this.loc = s,
                this.type = "PartialStatement",
                this.name = t,
                this.params = n || [],
                this.hash = r,
                this.indent = "",
                this.strip = i
            },
            ContentStatement: function(t, n) {
                this.loc = n,
                this.type = "ContentStatement",
                this.original = this.value = t
            },
            CommentStatement: function(t, n, r) {
                this.loc = r,
                this.type = "CommentStatement",
                this.value = t,
                this.strip = n
            },
            SubExpression: function(t, n, r, i) {
                this.loc = i,
                this.type = "SubExpression",
                this.path = t,
                this.params = n || [],
                this.hash = r
            },
            PathExpression: function(t, n, r, i, s) {
                this.loc = s,
                this.type = "PathExpression",
                this.data = t,
                this.original = i,
                this.parts = r,
                this.depth = n
            },
            StringLiteral: function(t, n) {
                this.loc = n,
                this.type = "StringLiteral",
                this.original = this.value = t
            },
            NumberLiteral: function(t, n) {
                this.loc = n,
                this.type = "NumberLiteral",
                this.original = this.value = Number(t)
            },
            BooleanLiteral: function(t, n) {
                this.loc = n,
                this.type = "BooleanLiteral",
                this.original = this.value = t === "true"
            },
            UndefinedLiteral: function(t) {
                this.loc = t,
                this.type = "UndefinedLiteral",
                this.original = this.value = undefined
            },
            NullLiteral: function(t) {
                this.loc = t,
                this.type = "NullLiteral",
                this.original = this.value = null
            },
            Hash: function(t, n) {
                this.loc = n,
                this.type = "Hash",
                this.pairs = t
            },
            HashPair: function(t, n, r) {
                this.loc = r,
                this.type = "HashPair",
                this.key = t,
                this.value = n
            },
            helpers: {
                helperExpression: function(t) {
                    return t.type === "SubExpression" || !!t.params.length || !!t.hash
                },
                scopedId: function(t) {
                    return /^\.|this\b/.test(t.original)
                },
                simpleId: function(t) {
                    return t.parts.length === 1 && !r.helpers.scopedId(t) && !t.depth
                }
            }
        };
        t["default"] = r,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function v(e, t) {
            if (e.type === "Program")
                return e;
            o["default"].yy = d,
            d.locInfo = function(e) {
                return new d.SourceLocation(t && t.srcName,e)
            }
            ;
            var n = new l["default"];
            return n.accept(o["default"].parse(e))
        }
        var r = n(8)["default"]
          , i = n(9)["default"];
        t.__esModule = !0,
        t.parse = v;
        var s = n(15)
          , o = r(s)
          , u = n(2)
          , a = r(u)
          , f = n(16)
          , l = r(f)
          , c = n(17)
          , h = i(c)
          , p = n(13);
        t.parser = o["default"];
        var d = {};
        p.extend(d, h, a["default"])
    }
    , function(e, t, n) {
        "use strict";
        function l() {}
        function c(e, t, n) {
            if (e == null || typeof e != "string" && e.type !== "Program")
                throw new s["default"]("You must pass a string or Handlebars AST to Handlebars.precompile. You passed " + e);
            t = t || {},
            "data"in t || (t.data = !0),
            t.compat && (t.useDepths = !0);
            var r = n.parse(e, t)
              , i = (new n.Compiler).compile(r, t);
            return (new n.JavaScriptCompiler).compile(i, t)
        }
        function h(e, t, n) {
            function o() {
                var t = n.parse(e, r)
                  , i = (new n.Compiler).compile(t, r)
                  , s = (new n.JavaScriptCompiler).compile(i, r, undefined, !0);
                return n.template(s)
            }
            function u(e, t) {
                return i || (i = o()),
                i.call(this, e, t)
            }
            var r = arguments[1] === undefined ? {} : arguments[1];
            if (e == null || typeof e != "string" && e.type !== "Program")
                throw new s["default"]("You must pass a string or Handlebars AST to Handlebars.compile. You passed " + e);
            "data"in r || (r.data = !0),
            r.compat && (r.useDepths = !0);
            var i = undefined;
            return u._setup = function(e) {
                return i || (i = o()),
                i._setup(e)
            }
            ,
            u._child = function(e, t, n, r) {
                return i || (i = o()),
                i._child(e, t, n, r)
            }
            ,
            u
        }
        function p(e, t) {
            if (e === t)
                return !0;
            if (o.isArray(e) && o.isArray(t) && e.length === t.length) {
                for (var n = 0; n < e.length; n++)
                    if (!p(e[n], t[n]))
                        return !1;
                return !0
            }
        }
        function d(e) {
            if (!e.path.parts) {
                var t = e.path;
                e.path = new a["default"].PathExpression(!1,0,[t.original + ""],t.original + "",t.loc)
            }
        }
        var r = n(8)["default"];
        t.__esModule = !0,
        t.Compiler = l,
        t.precompile = c,
        t.compile = h;
        var i = n(12)
          , s = r(i)
          , o = n(13)
          , u = n(2)
          , a = r(u)
          , f = [].slice;
        l.prototype = {
            compiler: l,
            equals: function(t) {
                var n = this.opcodes.length;
                if (t.opcodes.length !== n)
                    return !1;
                for (var r = 0; r < n; r++) {
                    var i = this.opcodes[r]
                      , s = t.opcodes[r];
                    if (i.opcode !== s.opcode || !p(i.args, s.args))
                        return !1
                }
                n = this.children.length;
                for (var r = 0; r < n; r++)
                    if (!this.children[r].equals(t.children[r]))
                        return !1;
                return !0
            },
            guid: 0,
            compile: function(t, n) {
                this.sourceNode = [],
                this.opcodes = [],
                this.children = [],
                this.options = n,
                this.stringParams = n.stringParams,
                this.trackIds = n.trackIds,
                n.blockParams = n.blockParams || [];
                var r = n.knownHelpers;
                n.knownHelpers = {
                    helperMissing: !0,
                    blockHelperMissing: !0,
                    each: !0,
                    "if": !0,
                    unless: !0,
                    "with": !0,
                    log: !0,
                    lookup: !0
                };
                if (r)
                    for (var i in r)
                        i in r && (n.knownHelpers[i] = r[i]);
                return this.accept(t)
            },
            compileProgram: function(t) {
                var n = new this.compiler
                  , r = n.compile(t, this.options)
                  , i = this.guid++;
                return this.usePartial = this.usePartial || r.usePartial,
                this.children[i] = r,
                this.useDepths = this.useDepths || r.useDepths,
                i
            },
            accept: function(t) {
                this.sourceNode.unshift(t);
                var n = this[t.type](t);
                return this.sourceNode.shift(),
                n
            },
            Program: function(t) {
                this.options.blockParams.unshift(t.blockParams);
                var n = t.body
                  , r = n.length;
                for (var i = 0; i < r; i++)
                    this.accept(n[i]);
                return this.options.blockParams.shift(),
                this.isSimple = r === 1,
                this.blockParams = t.blockParams ? t.blockParams.length : 0,
                this
            },
            BlockStatement: function(t) {
                d(t);
                var n = t.program
                  , r = t.inverse;
                n = n && this.compileProgram(n),
                r = r && this.compileProgram(r);
                var i = this.classifySexpr(t);
                i === "helper" ? this.helperSexpr(t, n, r) : i === "simple" ? (this.simpleSexpr(t),
                this.opcode("pushProgram", n),
                this.opcode("pushProgram", r),
                this.opcode("emptyHash"),
                this.opcode("blockValue", t.path.original)) : (this.ambiguousSexpr(t, n, r),
                this.opcode("pushProgram", n),
                this.opcode("pushProgram", r),
                this.opcode("emptyHash"),
                this.opcode("ambiguousBlockValue")),
                this.opcode("append")
            },
            PartialStatement: function(t) {
                this.usePartial = !0;
                var n = t.params;
                if (n.length > 1)
                    throw new s["default"]("Unsupported number of partial arguments: " + n.length,t);
                n.length || n.push({
                    type: "PathExpression",
                    parts: [],
                    depth: 0
                });
                var r = t.name.original
                  , i = t.name.type === "SubExpression";
                i && this.accept(t.name),
                this.setupFullMustacheParams(t, undefined, undefined, !0);
                var o = t.indent || "";
                this.options.preventIndent && o && (this.opcode("appendContent", o),
                o = ""),
                this.opcode("invokePartial", i, r, o),
                this.opcode("append")
            },
            MustacheStatement: function(t) {
                this.SubExpression(t),
                t.escaped && !this.options.noEscape ? this.opcode("appendEscaped") : this.opcode("append")
            },
            ContentStatement: function(t) {
                t.value && this.opcode("appendContent", t.value)
            },
            CommentStatement: function() {},
            SubExpression: function(t) {
                d(t);
                var n = this.classifySexpr(t);
                n === "simple" ? this.simpleSexpr(t) : n === "helper" ? this.helperSexpr(t) : this.ambiguousSexpr(t)
            },
            ambiguousSexpr: function(t, n, r) {
                var i = t.path
                  , s = i.parts[0]
                  , o = n != null || r != null;
                this.opcode("getContext", i.depth),
                this.opcode("pushProgram", n),
                this.opcode("pushProgram", r),
                this.accept(i),
                this.opcode("invokeAmbiguous", s, o)
            },
            simpleSexpr: function(t) {
                this.accept(t.path),
                this.opcode("resolvePossibleLambda")
            },
            helperSexpr: function(t, n, r) {
                var i = this.setupFullMustacheParams(t, n, r)
                  , o = t.path
                  , u = o.parts[0];
                if (this.options.knownHelpers[u])
                    this.opcode("invokeKnownHelper", i.length, u);
                else {
                    if (this.options.knownHelpersOnly)
                        throw new s["default"]("You specified knownHelpersOnly, but used the unknown helper " + u,t);
                    o.falsy = !0,
                    this.accept(o),
                    this.opcode("invokeHelper", i.length, o.original, a["default"].helpers.simpleId(o))
                }
            },
            PathExpression: function(t) {
                this.addDepth(t.depth),
                this.opcode("getContext", t.depth);
                var n = t.parts[0]
                  , r = a["default"].helpers.scopedId(t)
                  , i = !t.depth && !r && this.blockParamIndex(n);
                i ? this.opcode("lookupBlockParam", i, t.parts) : n ? t.data ? (this.options.data = !0,
                this.opcode("lookupData", t.depth, t.parts)) : this.opcode("lookupOnContext", t.parts, t.falsy, r) : this.opcode("pushContext")
            },
            StringLiteral: function(t) {
                this.opcode("pushString", t.value)
            },
            NumberLiteral: function(t) {
                this.opcode("pushLiteral", t.value)
            },
            BooleanLiteral: function(t) {
                this.opcode("pushLiteral", t.value)
            },
            UndefinedLiteral: function() {
                this.opcode("pushLiteral", "undefined")
            },
            NullLiteral: function() {
                this.opcode("pushLiteral", "null")
            },
            Hash: function(t) {
                var n = t.pairs
                  , r = 0
                  , i = n.length;
                this.opcode("pushHash");
                for (; r < i; r++)
                    this.pushParam(n[r].value);
                while (r--)
                    this.opcode("assignToHash", n[r].key);
                this.opcode("popHash")
            },
            opcode: function(t) {
                this.opcodes.push({
                    opcode: t,
                    args: f.call(arguments, 1),
                    loc: this.sourceNode[0].loc
                })
            },
            addDepth: function(t) {
                if (!t)
                    return;
                this.useDepths = !0
            },
            classifySexpr: function(t) {
                var n = a["default"].helpers.simpleId(t.path)
                  , r = n && !!this.blockParamIndex(t.path.parts[0])
                  , i = !r && a["default"].helpers.helperExpression(t)
                  , s = !r && (i || n);
                if (s && !i) {
                    var o = t.path.parts[0]
                      , u = this.options;
                    u.knownHelpers[o] ? i = !0 : u.knownHelpersOnly && (s = !1)
                }
                return i ? "helper" : s ? "ambiguous" : "simple"
            },
            pushParams: function(t) {
                for (var n = 0, r = t.length; n < r; n++)
                    this.pushParam(t[n])
            },
            pushParam: function(t) {
                var n = t.value != null ? t.value : t.original || "";
                if (this.stringParams)
                    n.replace && (n = n.replace(/^(\.?\.\/)*/g, "").replace(/\//g, ".")),
                    t.depth && this.addDepth(t.depth),
                    this.opcode("getContext", t.depth || 0),
                    this.opcode("pushStringParam", n, t.type),
                    t.type === "SubExpression" && this.accept(t);
                else {
                    if (this.trackIds) {
                        var r = undefined;
                        t.parts && !a["default"].helpers.scopedId(t) && !t.depth && (r = this.blockParamIndex(t.parts[0]));
                        if (r) {
                            var i = t.parts.slice(1).join(".");
                            this.opcode("pushId", "BlockParam", r, i)
                        } else
                            n = t.original || n,
                            n.replace && (n = n.replace(/^\.\//g, "").replace(/^\.$/g, "")),
                            this.opcode("pushId", t.type, n)
                    }
                    this.accept(t)
                }
            },
            setupFullMustacheParams: function(t, n, r, i) {
                var s = t.params;
                return this.pushParams(s),
                this.opcode("pushProgram", n),
                this.opcode("pushProgram", r),
                t.hash ? this.accept(t.hash) : this.opcode("emptyHash", i),
                s
            },
            blockParamIndex: function(t) {
                for (var n = 0, r = this.options.blockParams.length; n < r; n++) {
                    var i = this.options.blockParams[n]
                      , s = i && o.indexOf(i, t);
                    if (i && s >= 0)
                        return [n, s]
                }
            }
        }
    }
    , function(e, t, n) {
        "use strict";
        function l(e) {
            this.value = e
        }
        function c() {}
        function h(e, t, n, r) {
            var i = t.popStack()
              , s = 0
              , o = n.length;
            e && o--;
            for (; s < o; s++)
                i = t.nameLookup(i, n[s], r);
            return e ? [t.aliasable("this.strict"), "(", i, ", ", t.quotedString(n[s]), ")"] : i
        }
        var r = n(8)["default"];
        t.__esModule = !0;
        var i = n(10)
          , s = n(12)
          , o = r(s)
          , u = n(13)
          , a = n(18)
          , f = r(a);
        c.prototype = {
            nameLookup: function(t, n) {
                return c.isValidJavaScriptVariableName(n) ? [t, ".", n] : [t, "['", n, "']"]
            },
            depthedLookup: function(t) {
                return [this.aliasable("this.lookup"), '(depths, "', t, '")']
            },
            compilerInfo: function() {
                var t = i.COMPILER_REVISION
                  , n = i.REVISION_CHANGES[t];
                return [t, n]
            },
            appendToBuffer: function(t, n, r) {
                return u.isArray(t) || (t = [t]),
                t = this.source.wrap(t, n),
                this.environment.isSimple ? ["return ", t, ";"] : r ? ["buffer += ", t, ";"] : (t.appendToBuffer = !0,
                t)
            },
            initializeBuffer: function() {
                return this.quotedString("")
            },
            compile: function(t, n, r, i) {
                this.environment = t,
                this.options = n,
                this.stringParams = this.options.stringParams,
                this.trackIds = this.options.trackIds,
                this.precompile = !i,
                this.name = this.environment.name,
                this.isChild = !!r,
                this.context = r || {
                    programs: [],
                    environments: []
                },
                this.preamble(),
                this.stackSlot = 0,
                this.stackVars = [],
                this.aliases = {},
                this.registers = {
                    list: []
                },
                this.hashes = [],
                this.compileStack = [],
                this.inlineStack = [],
                this.blockParams = [],
                this.compileChildren(t, n),
                this.useDepths = this.useDepths || t.useDepths || this.options.compat,
                this.useBlockParams = this.useBlockParams || t.useBlockParams;
                var s = t.opcodes
                  , u = undefined
                  , a = undefined
                  , f = undefined
                  , l = undefined;
                for (f = 0,
                l = s.length; f < l; f++)
                    u = s[f],
                    this.source.currentLocation = u.loc,
                    a = a || u.loc,
                    this[u.opcode].apply(this, u.args);
                this.source.currentLocation = a,
                this.pushSource("");
                if (this.stackSlot || this.inlineStack.length || this.compileStack.length)
                    throw new o["default"]("Compile completed with content left on stack");
                var c = this.createFunctionContext(i);
                if (!this.isChild) {
                    var h = {
                        compiler: this.compilerInfo(),
                        main: c
                    }
                      , p = this.context.programs;
                    for (f = 0,
                    l = p.length; f < l; f++)
                        p[f] && (h[f] = p[f]);
                    return this.environment.usePartial && (h.usePartial = !0),
                    this.options.data && (h.useData = !0),
                    this.useDepths && (h.useDepths = !0),
                    this.useBlockParams && (h.useBlockParams = !0),
                    this.options.compat && (h.compat = !0),
                    i ? h.compilerOptions = this.options : (h.compiler = JSON.stringify(h.compiler),
                    this.source.currentLocation = {
                        start: {
                            line: 1,
                            column: 0
                        }
                    },
                    h = this.objectLiteral(h),
                    n.srcName ? (h = h.toStringWithSourceMap({
                        file: n.destName
                    }),
                    h.map = h.map && h.map.toString()) : h = h.toString()),
                    h
                }
                return c
            },
            preamble: function() {
                this.lastContext = 0,
                this.source = new f["default"](this.options.srcName)
            },
            createFunctionContext: function(t) {
                var n = ""
                  , r = this.stackVars.concat(this.registers.list);
                r.length > 0 && (n += ", " + r.join(", "));
                var i = 0;
                for (var s in this.aliases) {
                    var o = this.aliases[s];
                    this.aliases.hasOwnProperty(s) && o.children && o.referenceCount > 1 && (n += ", alias" + ++i + "=" + s,
                    o.children[0] = "alias" + i)
                }
                var u = ["depth0", "helpers", "partials", "data"];
                (this.useBlockParams || this.useDepths) && u.push("blockParams"),
                this.useDepths && u.push("depths");
                var a = this.mergeSource(n);
                return t ? (u.push(a),
                Function.apply(this, u)) : this.source.wrap(["function(", u.join(","), ") {\n  ", a, "}"])
            },
            mergeSource: function(t) {
                var n = this.environment.isSimple
                  , r = !this.forceBuffer
                  , i = undefined
                  , s = undefined
                  , o = undefined
                  , u = undefined;
                return this.source.each(function(e) {
                    e.appendToBuffer ? (o ? e.prepend("  + ") : o = e,
                    u = e) : (o && (s ? o.prepend("buffer += ") : i = !0,
                    u.add(";"),
                    o = u = undefined),
                    s = !0,
                    n || (r = !1))
                }),
                r ? o ? (o.prepend("return "),
                u.add(";")) : s || this.source.push('return "";') : (t += ", buffer = " + (i ? "" : this.initializeBuffer()),
                o ? (o.prepend("return buffer + "),
                u.add(";")) : this.source.push("return buffer;")),
                t && this.source.prepend("var " + t.substring(2) + (i ? "" : ";\n")),
                this.source.merge()
            },
            blockValue: function(t) {
                var n = this.aliasable("helpers.blockHelperMissing")
                  , r = [this.contextName(0)];
                this.setupHelperArgs(t, 0, r);
                var i = this.popStack();
                r.splice(1, 0, i),
                this.push(this.source.functionCall(n, "call", r))
            },
            ambiguousBlockValue: function() {
                var t = this.aliasable("helpers.blockHelperMissing")
                  , n = [this.contextName(0)];
                this.setupHelperArgs("", 0, n, !0),
                this.flushInline();
                var r = this.topStack();
                n.splice(1, 0, r),
                this.pushSource(["if (!", this.lastHelper, ") { ", r, " = ", this.source.functionCall(t, "call", n), "}"])
            },
            appendContent: function(t) {
                this.pendingContent ? t = this.pendingContent + t : this.pendingLocation = this.source.currentLocation,
                this.pendingContent = t
            },
            append: function() {
                if (this.isInline())
                    this.replaceStack(function(e) {
                        return [" != null ? ", e, ' : ""']
                    }),
                    this.pushSource(this.appendToBuffer(this.popStack()));
                else {
                    var t = this.popStack();
                    this.pushSource(["if (", t, " != null) { ", this.appendToBuffer(t, undefined, !0), " }"]),
                    this.environment.isSimple && this.pushSource(["else { ", this.appendToBuffer("''", undefined, !0), " }"])
                }
            },
            appendEscaped: function() {
                this.pushSource(this.appendToBuffer([this.aliasable("this.escapeExpression"), "(", this.popStack(), ")"]))
            },
            getContext: function(t) {
                this.lastContext = t
            },
            pushContext: function() {
                this.pushStackLiteral(this.contextName(this.lastContext))
            },
            lookupOnContext: function(t, n, r) {
                var i = 0;
                !r && this.options.compat && !this.lastContext ? this.push(this.depthedLookup(t[i++])) : this.pushContext(),
                this.resolvePath("context", t, i, n)
            },
            lookupBlockParam: function(t, n) {
                this.useBlockParams = !0,
                this.push(["blockParams[", t[0], "][", t[1], "]"]),
                this.resolvePath("context", n, 1)
            },
            lookupData: function(t, n) {
                t ? this.pushStackLiteral("this.data(data, " + t + ")") : this.pushStackLiteral("data"),
                this.resolvePath("data", n, 0, !0)
            },
            resolvePath: function(t, n, r, i) {
                var s = this;
                if (this.options.strict || this.options.assumeObjects) {
                    this.push(h(this.options.strict, this, n, t));
                    return
                }
                var o = n.length;
                for (; r < o; r++)
                    this.replaceStack(function(e) {
                        var o = s.nameLookup(e, n[r], t);
                        return i ? [" && ", o] : [" != null ? ", o, " : ", e]
                    })
            },
            resolvePossibleLambda: function() {
                this.push([this.aliasable("this.lambda"), "(", this.popStack(), ", ", this.contextName(0), ")"])
            },
            pushStringParam: function(t, n) {
                this.pushContext(),
                this.pushString(n),
                n !== "SubExpression" && (typeof t == "string" ? this.pushString(t) : this.pushStackLiteral(t))
            },
            emptyHash: function(t) {
                this.trackIds && this.push("{}"),
                this.stringParams && (this.push("{}"),
                this.push("{}")),
                this.pushStackLiteral(t ? "undefined" : "{}")
            },
            pushHash: function() {
                this.hash && this.hashes.push(this.hash),
                this.hash = {
                    values: [],
                    types: [],
                    contexts: [],
                    ids: []
                }
            },
            popHash: function() {
                var t = this.hash;
                this.hash = this.hashes.pop(),
                this.trackIds && this.push(this.objectLiteral(t.ids)),
                this.stringParams && (this.push(this.objectLiteral(t.contexts)),
                this.push(this.objectLiteral(t.types))),
                this.push(this.objectLiteral(t.values))
            },
            pushString: function(t) {
                this.pushStackLiteral(this.quotedString(t))
            },
            pushLiteral: function(t) {
                this.pushStackLiteral(t)
            },
            pushProgram: function(t) {
                t != null ? this.pushStackLiteral(this.programExpression(t)) : this.pushStackLiteral(null)
            },
            invokeHelper: function(t, n, r) {
                var i = this.popStack()
                  , s = this.setupHelper(t, n)
                  , o = r ? [s.name, " || "] : ""
                  , u = ["("].concat(o, i);
                this.options.strict || u.push(" || ", this.aliasable("helpers.helperMissing")),
                u.push(")"),
                this.push(this.source.functionCall(u, "call", s.callParams))
            },
            invokeKnownHelper: function(t, n) {
                var r = this.setupHelper(t, n);
                this.push(this.source.functionCall(r.name, "call", r.callParams))
            },
            invokeAmbiguous: function(t, n) {
                this.useRegister("helper");
                var r = this.popStack();
                this.emptyHash();
                var i = this.setupHelper(0, t, n)
                  , s = this.lastHelper = this.nameLookup("helpers", t, "helper")
                  , o = ["(", "(helper = ", s, " || ", r, ")"];
                this.options.strict || (o[0] = "(helper = ",
                o.push(" != null ? helper : ", this.aliasable("helpers.helperMissing"))),
                this.push(["(", o, i.paramsInit ? ["),(", i.paramsInit] : [], "),", "(typeof helper === ", this.aliasable('"function"'), " ? ", this.source.functionCall("helper", "call", i.callParams), " : helper))"])
            },
            invokePartial: function(t, n, r) {
                var i = []
                  , s = this.setupParams(n, 1, i, !1);
                t && (n = this.popStack(),
                delete s.name),
                r && (s.indent = JSON.stringify(r)),
                s.helpers = "helpers",
                s.partials = "partials",
                t ? i.unshift(n) : i.unshift(this.nameLookup("partials", n, "partial")),
                this.options.compat && (s.depths = "depths"),
                s = this.objectLiteral(s),
                i.push(s),
                this.push(this.source.functionCall("this.invokePartial", "", i))
            },
            assignToHash: function(t) {
                var n = this.popStack()
                  , r = undefined
                  , i = undefined
                  , s = undefined;
                this.trackIds && (s = this.popStack()),
                this.stringParams && (i = this.popStack(),
                r = this.popStack());
                var o = this.hash;
                r && (o.contexts[t] = r),
                i && (o.types[t] = i),
                s && (o.ids[t] = s),
                o.values[t] = n
            },
            pushId: function(t, n, r) {
                t === "BlockParam" ? this.pushStackLiteral("blockParams[" + n[0] + "].path[" + n[1] + "]" + (r ? " + " + JSON.stringify("." + r) : "")) : t === "PathExpression" ? this.pushString(n) : t === "SubExpression" ? this.pushStackLiteral("true") : this.pushStackLiteral("null")
            },
            compiler: c,
            compileChildren: function(t, n) {
                var r = t.children
                  , i = undefined
                  , s = undefined;
                for (var o = 0, u = r.length; o < u; o++) {
                    i = r[o],
                    s = new this.compiler;
                    var a = this.matchExistingProgram(i);
                    a == null ? (this.context.programs.push(""),
                    a = this.context.programs.length,
                    i.index = a,
                    i.name = "program" + a,
                    this.context.programs[a] = s.compile(i, n, this.context, !this.precompile),
                    this.context.environments[a] = i,
                    this.useDepths = this.useDepths || s.useDepths,
                    this.useBlockParams = this.useBlockParams || s.useBlockParams) : (i.index = a,
                    i.name = "program" + a,
                    this.useDepths = this.useDepths || i.useDepths,
                    this.useBlockParams = this.useBlockParams || i.useBlockParams)
                }
            },
            matchExistingProgram: function(t) {
                for (var n = 0, r = this.context.environments.length; n < r; n++) {
                    var i = this.context.environments[n];
                    if (i && i.equals(t))
                        return n
                }
            },
            programExpression: function(t) {
                var n = this.environment.children[t]
                  , r = [n.index, "data", n.blockParams];
                return (this.useBlockParams || this.useDepths) && r.push("blockParams"),
                this.useDepths && r.push("depths"),
                "this.program(" + r.join(", ") + ")"
            },
            useRegister: function(t) {
                this.registers[t] || (this.registers[t] = !0,
                this.registers.list.push(t))
            },
            push: function(t) {
                return t instanceof l || (t = this.source.wrap(t)),
                this.inlineStack.push(t),
                t
            },
            pushStackLiteral: function(t) {
                this.push(new l(t))
            },
            pushSource: function(t) {
                this.pendingContent && (this.source.push(this.appendToBuffer(this.source.quotedString(this.pendingContent), this.pendingLocation)),
                this.pendingContent = undefined),
                t && this.source.push(t)
            },
            replaceStack: function(t) {
                var n = ["("]
                  , r = undefined
                  , i = undefined
                  , s = undefined;
                if (!this.isInline())
                    throw new o["default"]("replaceStack on non-inline");
                var u = this.popStack(!0);
                if (u instanceof l)
                    r = [u.value],
                    n = ["(", r],
                    s = !0;
                else {
                    i = !0;
                    var a = this.incrStack();
                    n = ["((", this.push(a), " = ", u, ")"],
                    r = this.topStack()
                }
                var f = t.call(this, r);
                s || this.popStack(),
                i && this.stackSlot--,
                this.push(n.concat(f, ")"))
            },
            incrStack: function() {
                return this.stackSlot++,
                this.stackSlot > this.stackVars.length && this.stackVars.push("stack" + this.stackSlot),
                this.topStackName()
            },
            topStackName: function() {
                return "stack" + this.stackSlot
            },
            flushInline: function() {
                var t = this.inlineStack;
                this.inlineStack = [];
                for (var n = 0, r = t.length; n < r; n++) {
                    var i = t[n];
                    if (i instanceof l)
                        this.compileStack.push(i);
                    else {
                        var s = this.incrStack();
                        this.pushSource([s, " = ", i, ";"]),
                        this.compileStack.push(s)
                    }
                }
            },
            isInline: function() {
                return this.inlineStack.length
            },
            popStack: function(t) {
                var n = this.isInline()
                  , r = (n ? this.inlineStack : this.compileStack).pop();
                if (!t && r instanceof l)
                    return r.value;
                if (!n) {
                    if (!this.stackSlot)
                        throw new o["default"]("Invalid stack pop");
                    this.stackSlot--
                }
                return r
            },
            topStack: function() {
                var t = this.isInline() ? this.inlineStack : this.compileStack
                  , n = t[t.length - 1];
                return n instanceof l ? n.value : n
            },
            contextName: function(t) {
                return this.useDepths && t ? "depths[" + t + "]" : "depth" + t
            },
            quotedString: function(t) {
                return this.source.quotedString(t)
            },
            objectLiteral: function(t) {
                return this.source.objectLiteral(t)
            },
            aliasable: function(t) {
                var n = this.aliases[t];
                return n ? (n.referenceCount++,
                n) : (n = this.aliases[t] = this.source.wrap(t),
                n.aliasable = !0,
                n.referenceCount = 1,
                n)
            },
            setupHelper: function(t, n, r) {
                var i = []
                  , s = this.setupHelperArgs(n, t, i, r)
                  , o = this.nameLookup("helpers", n, "helper");
                return {
                    params: i,
                    paramsInit: s,
                    name: o,
                    callParams: [this.contextName(0)].concat(i)
                }
            },
            setupParams: function(t, n, r) {
                var i = {}
                  , s = []
                  , o = []
                  , u = []
                  , a = undefined;
                i.name = this.quotedString(t),
                i.hash = this.popStack(),
                this.trackIds && (i.hashIds = this.popStack()),
                this.stringParams && (i.hashTypes = this.popStack(),
                i.hashContexts = this.popStack());
                var f = this.popStack()
                  , l = this.popStack();
                if (l || f)
                    i.fn = l || "this.noop",
                    i.inverse = f || "this.noop";
                var c = n;
                while (c--)
                    a = this.popStack(),
                    r[c] = a,
                    this.trackIds && (u[c] = this.popStack()),
                    this.stringParams && (o[c] = this.popStack(),
                    s[c] = this.popStack());
                return this.trackIds && (i.ids = this.source.generateArray(u)),
                this.stringParams && (i.types = this.source.generateArray(o),
                i.contexts = this.source.generateArray(s)),
                this.options.data && (i.data = "data"),
                this.useBlockParams && (i.blockParams = "blockParams"),
                i
            },
            setupHelperArgs: function(t, n, r, i) {
                var s = this.setupParams(t, n, r, !0);
                return s = this.objectLiteral(s),
                i ? (this.useRegister("options"),
                r.push("options"),
                ["options=", s]) : (r.push(s),
                "")
            }
        },
        function() {
            var e = "break else new var case finally return void catch for switch while continue function this with default if throw delete in try do instanceof typeof abstract enum int short boolean export interface static byte extends long super char final native synchronized class float package throws const goto private transient debugger implements protected volatile double import public let yield await null true false".split(" ")
              , t = c.RESERVED_WORDS = {};
            for (var n = 0, r = e.length; n < r; n++)
                t[e[n]] = !0
        }(),
        c.isValidJavaScriptVariableName = function(e) {
            return !c.RESERVED_WORDS[e] && /^[a-zA-Z_$][0-9a-zA-Z_$]*$/.test(e)
        }
        ,
        t["default"] = c,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function a() {
            this.parents = []
        }
        var r = n(8)["default"];
        t.__esModule = !0;
        var i = n(12)
          , s = r(i)
          , o = n(2)
          , u = r(o);
        a.prototype = {
            constructor: a,
            mutating: !1,
            acceptKey: function(t, n) {
                var r = this.accept(t[n]);
                if (this.mutating) {
                    if (r && (!r.type || !u["default"][r.type]))
                        throw new s["default"]('Unexpected node type "' + r.type + '" found when accepting ' + n + " on " + t.type);
                    t[n] = r
                }
            },
            acceptRequired: function(t, n) {
                this.acceptKey(t, n);
                if (!t[n])
                    throw new s["default"](t.type + " requires " + n)
            },
            acceptArray: function(t) {
                for (var n = 0, r = t.length; n < r; n++)
                    this.acceptKey(t, n),
                    t[n] || (t.splice(n, 1),
                    n--,
                    r--)
            },
            accept: function(t) {
                if (!t)
                    return;
                this.current && this.parents.unshift(this.current),
                this.current = t;
                var n = this[t.type](t);
                this.current = this.parents.shift();
                if (!this.mutating || n)
                    return n;
                if (n !== !1)
                    return t
            },
            Program: function(t) {
                this.acceptArray(t.body)
            },
            MustacheStatement: function(t) {
                this.acceptRequired(t, "path"),
                this.acceptArray(t.params),
                this.acceptKey(t, "hash")
            },
            BlockStatement: function(t) {
                this.acceptRequired(t, "path"),
                this.acceptArray(t.params),
                this.acceptKey(t, "hash"),
                this.acceptKey(t, "program"),
                this.acceptKey(t, "inverse")
            },
            PartialStatement: function(t) {
                this.acceptRequired(t, "name"),
                this.acceptArray(t.params),
                this.acceptKey(t, "hash")
            },
            ContentStatement: function() {},
            CommentStatement: function() {},
            SubExpression: function(t) {
                this.acceptRequired(t, "path"),
                this.acceptArray(t.params),
                this.acceptKey(t, "hash")
            },
            PathExpression: function() {},
            StringLiteral: function() {},
            NumberLiteral: function() {},
            BooleanLiteral: function() {},
            UndefinedLiteral: function() {},
            NullLiteral: function() {},
            Hash: function(t) {
                this.acceptArray(t.pairs)
            },
            HashPair: function(t) {
                this.acceptRequired(t, "value")
            }
        },
        t["default"] = a,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        (function(n) {
            "use strict";
            t.__esModule = !0,
            t["default"] = function(e) {
                var t = typeof n != "undefined" ? n : window
                  , r = t.Handlebars;
                e.noConflict = function() {
                    t.Handlebars === e && (t.Handlebars = r)
                }
            }
            ,
            e.exports = t["default"]
        }
        ).call(t, function() {
            return this
        }())
    }
    , function(e, t, n) {
        "use strict";
        t["default"] = function(e) {
            return e && e.__esModule ? e : {
                "default": e
            }
        }
        ,
        t.__esModule = !0
    }
    , function(e, t, n) {
        "use strict";
        t["default"] = function(e) {
            if (e && e.__esModule)
                return e;
            var t = {};
            if (typeof e == "object" && e !== null)
                for (var n in e)
                    Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
            return t["default"] = e,
            t
        }
        ,
        t.__esModule = !0
    }
    , function(e, t, n) {
        "use strict";
        function m(e, t) {
            this.helpers = e || {},
            this.partials = t || {},
            g(this)
        }
        function g(e) {
            e.registerHelper("helperMissing", function() {
                if (arguments.length === 1)
                    return undefined;
                throw new a["default"]('Missing helper: "' + arguments[arguments.length - 1].name + '"')
            }),
            e.registerHelper("blockHelperMissing", function(t, n) {
                var r = n.inverse
                  , i = n.fn;
                if (t === !0)
                    return i(this);
                if (t === !1 || t == null)
                    return r(this);
                if (h(t))
                    return t.length > 0 ? (n.ids && (n.ids = [n.name]),
                    e.helpers.each(t, n)) : r(this);
                if (n.data && n.ids) {
                    var s = w(n.data);
                    s.contextPath = o.appendContextPath(n.data.contextPath, n.name),
                    n = {
                        data: s
                    }
                }
                return i(t, n)
            }),
            e.registerHelper("each", function(e, t) {
                function l(t, r, i) {
                    u && (u.key = t,
                    u.index = r,
                    u.first = r === 0,
                    u.last = !!i,
                    f && (u.contextPath = f + t)),
                    s += n(e[t], {
                        data: u,
                        blockParams: o.blockParams([e[t], t], [f + t, null])
                    })
                }
                if (!t)
                    throw new a["default"]("Must pass iterator to #each");
                var n = t.fn
                  , r = t.inverse
                  , i = 0
                  , s = ""
                  , u = undefined
                  , f = undefined;
                t.data && t.ids && (f = o.appendContextPath(t.data.contextPath, t.ids[0]) + "."),
                p(e) && (e = e.call(this)),
                t.data && (u = w(t.data));
                if (e && typeof e == "object")
                    if (h(e))
                        for (var c = e.length; i < c; i++)
                            l(i, i, i === e.length - 1);
                    else {
                        var d = undefined;
                        for (var v in e)
                            e.hasOwnProperty(v) && (d && l(d, i - 1),
                            d = v,
                            i++);
                        d && l(d, i - 1, !0)
                    }
                return i === 0 && (s = r(this)),
                s
            }),
            e.registerHelper("if", function(e, t) {
                return p(e) && (e = e.call(this)),
                !t.hash.includeZero && !e || o.isEmpty(e) ? t.inverse(this) : t.fn(this)
            }),
            e.registerHelper("unless", function(t, n) {
                return e.helpers["if"].call(this, t, {
                    fn: n.inverse,
                    inverse: n.fn,
                    hash: n.hash
                })
            }),
            e.registerHelper("with", function(e, t) {
                p(e) && (e = e.call(this));
                var n = t.fn;
                if (!o.isEmpty(e)) {
                    if (t.data && t.ids) {
                        var r = w(t.data);
                        r.contextPath = o.appendContextPath(t.data.contextPath, t.ids[0]),
                        t = {
                            data: r
                        }
                    }
                    return n(e, t)
                }
                return t.inverse(this)
            }),
            e.registerHelper("log", function(t, n) {
                var r = n.data && n.data.level != null ? parseInt(n.data.level, 10) : 1;
                e.log(r, t)
            }),
            e.registerHelper("lookup", function(e, t) {
                return e && e[t]
            })
        }
        function w(e) {
            var t = o.extend({}, e);
            return t._parent = e,
            t
        }
        var r = n(9)["default"]
          , i = n(8)["default"];
        t.__esModule = !0,
        t.HandlebarsEnvironment = m,
        t.createFrame = w;
        var s = n(13)
          , o = r(s)
          , u = n(12)
          , a = i(u)
          , f = "3.0.1";
        t.VERSION = f;
        var l = 6;
        t.COMPILER_REVISION = l;
        var c = {
            1: "<= 1.0.rc.2",
            2: "== 1.0.0-rc.3",
            3: "== 1.0.0-rc.4",
            4: "== 1.x.x",
            5: "== 2.0.0-alpha.x",
            6: ">= 2.0.0-beta.1"
        };
        t.REVISION_CHANGES = c;
        var h = o.isArray
          , p = o.isFunction
          , d = o.toString
          , v = "[object Object]";
        m.prototype = {
            constructor: m,
            logger: y,
            log: b,
            registerHelper: function(t, n) {
                if (d.call(t) === v) {
                    if (n)
                        throw new a["default"]("Arg not supported with multiple helpers");
                    o.extend(this.helpers, t)
                } else
                    this.helpers[t] = n
            },
            unregisterHelper: function(t) {
                delete this.helpers[t]
            },
            registerPartial: function(t, n) {
                if (d.call(t) === v)
                    o.extend(this.partials, t);
                else {
                    if (typeof n == "undefined")
                        throw new a["default"]("Attempting to register a partial as undefined");
                    this.partials[t] = n
                }
            },
            unregisterPartial: function(t) {
                delete this.partials[t]
            }
        };
        var y = {
            methodMap: {
                0: "debug",
                1: "info",
                2: "warn",
                3: "error"
            },
            DEBUG: 0,
            INFO: 1,
            WARN: 2,
            ERROR: 3,
            level: 1,
            log: function(t, n) {
                if (typeof console != "undefined" && y.level <= t) {
                    var r = y.methodMap[t];
                    (console[r] || console.log).call(console, n)
                }
            }
        };
        t.logger = y;
        var b = y.log;
        t.log = b
    }
    , function(e, t, n) {
        "use strict";
        function r(e) {
            this.string = e
        }
        t.__esModule = !0,
        r.prototype.toString = r.prototype.toHTML = function() {
            return "" + this.string
        }
        ,
        t["default"] = r,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function i(e, t) {
            var n = t && t.loc
              , s = undefined
              , o = undefined;
            n && (s = n.start.line,
            o = n.start.column,
            e += " - " + s + ":" + o);
            var u = Error.prototype.constructor.call(this, e);
            for (var a = 0; a < r.length; a++)
                this[r[a]] = u[r[a]];
            Error.captureStackTrace && Error.captureStackTrace(this, i),
            n && (this.lineNumber = s,
            this.column = o)
        }
        t.__esModule = !0;
        var r = ["description", "fileName", "lineNumber", "message", "name", "number", "stack"];
        i.prototype = new Error,
        t["default"] = i,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function o(e) {
            return r[e]
        }
        function u(e) {
            for (var t = 1; t < arguments.length; t++)
                for (var n in arguments[t])
                    Object.prototype.hasOwnProperty.call(arguments[t], n) && (e[n] = arguments[t][n]);
            return e
        }
        function c(e, t) {
            for (var n = 0, r = e.length; n < r; n++)
                if (e[n] === t)
                    return n;
            return -1
        }
        function h(e) {
            if (typeof e != "string") {
                if (e && e.toHTML)
                    return e.toHTML();
                if (e == null)
                    return "";
                if (!e)
                    return e + "";
                e = "" + e
            }
            return s.test(e) ? e.replace(i, o) : e
        }
        function p(e) {
            return !e && e !== 0 ? !0 : l(e) && e.length === 0 ? !0 : !1
        }
        function d(e, t) {
            return e.path = t,
            e
        }
        function v(e, t) {
            return (e ? e + "." : "") + t
        }
        t.__esModule = !0,
        t.extend = u,
        t.indexOf = c,
        t.escapeExpression = h,
        t.isEmpty = p,
        t.blockParams = d,
        t.appendContextPath = v;
        var r = {
            "&": "&amp;",
            "<": "&lt;",
            ">": "&gt;",
            '"': "&quot;",
            "'": "&#x27;",
            "`": "&#x60;"
        }
          , i = /[&<>"'`]/g
          , s = /[&<>"'`]/
          , a = Object.prototype.toString;
        t.toString = a;
        var f = function(t) {
            return typeof t == "function"
        };
        f(/x/) && (t.isFunction = f = function(e) {
            return typeof e == "function" && a.call(e) === "[object Function]"
        }
        );
        var f;
        t.isFunction = f;
        var l = Array.isArray || function(e) {
            return e && typeof e == "object" ? a.call(e) === "[object Array]" : !1
        }
        ;
        t.isArray = l
    }
    , function(e, t, n) {
        "use strict";
        function l(e) {
            var t = e && e[0] || 1
              , n = f.COMPILER_REVISION;
            if (t !== n) {
                if (t < n) {
                    var r = f.REVISION_CHANGES[n]
                      , i = f.REVISION_CHANGES[t];
                    throw new a["default"]("Template was precompiled with an older version of Handlebars than the current runtime. Please update your precompiler to a newer version (" + r + ") or downgrade your runtime to an older version (" + i + ").")
                }
                throw new a["default"]("Template was precompiled with a newer version of Handlebars than the current runtime. Please update your runtime to a newer version (" + e[1] + ").")
            }
        }
        function c(e, t) {
            function n(n, r, i) {
                i.hash && (r = o.extend({}, r, i.hash)),
                n = t.VM.resolvePartial.call(this, n, r, i);
                var s = t.VM.invokePartial.call(this, n, r, i);
                s == null && t.compile && (i.partials[i.name] = t.compile(n, e.compilerOptions, t),
                s = i.partials[i.name](r, i));
                if (s != null) {
                    if (i.indent) {
                        var u = s.split("\n");
                        for (var f = 0, l = u.length; f < l; f++) {
                            if (!u[f] && f + 1 === l)
                                break;
                            u[f] = i.indent + u[f]
                        }
                        s = u.join("\n")
                    }
                    return s
                }
                throw new a["default"]("The partial " + i.name + " could not be compiled when running in runtime-only mode")
            }
            function i(t) {
                var n = arguments[1] === undefined ? {} : arguments[1]
                  , s = n.data;
                i._setup(n),
                !n.partial && e.useData && (s = m(t, s));
                var o = undefined
                  , u = e.useBlockParams ? [] : undefined;
                return e.useDepths && (o = n.depths ? [t].concat(n.depths) : [t]),
                e.main.call(r, t, r.helpers, r.partials, s, u, o)
            }
            if (!t)
                throw new a["default"]("No environment passed to template");
            if (!e || !e.main)
                throw new a["default"]("Unknown template object: " + typeof e);
            t.VM.checkRevision(e.compiler);
            var r = {
                strict: function(t, n) {
                    if (n in t)
                        return t[n];
                    throw new a["default"]('"' + n + '" not defined in ' + t)
                },
                lookup: function(t, n) {
                    var r = t.length;
                    for (var i = 0; i < r; i++)
                        if (t[i] && t[i][n] != null)
                            return t[i][n]
                },
                lambda: function(t, n) {
                    return typeof t == "function" ? t.call(n) : t
                },
                escapeExpression: o.escapeExpression,
                invokePartial: n,
                fn: function(n) {
                    return e[n]
                },
                programs: [],
                program: function(t, n, r, i, s) {
                    var o = this.programs[t]
                      , u = this.fn(t);
                    return n || s || i || r ? o = h(this, t, u, n, r, i, s) : o || (o = this.programs[t] = h(this, t, u)),
                    o
                },
                data: function(t, n) {
                    while (t && n--)
                        t = t._parent;
                    return t
                },
                merge: function(t, n) {
                    var r = t || n;
                    return t && n && t !== n && (r = o.extend({}, n, t)),
                    r
                },
                noop: t.VM.noop,
                compilerInfo: e.compiler
            };
            return i.isTop = !0,
            i._setup = function(n) {
                n.partial ? (r.helpers = n.helpers,
                r.partials = n.partials) : (r.helpers = r.merge(n.helpers, t.helpers),
                e.usePartial && (r.partials = r.merge(n.partials, t.partials)))
            }
            ,
            i._child = function(t, n, i, s) {
                if (e.useBlockParams && !i)
                    throw new a["default"]("must pass block params");
                if (e.useDepths && !s)
                    throw new a["default"]("must pass parent depths");
                return h(r, t, e[t], n, 0, i, s)
            }
            ,
            i
        }
        function h(e, t, n, r, i, s, o) {
            function u(t) {
                var i = arguments[1] === undefined ? {} : arguments[1];
                return n.call(e, t, e.helpers, e.partials, i.data || r, s && [i.blockParams].concat(s), o && [t].concat(o))
            }
            return u.program = t,
            u.depth = o ? o.length : 0,
            u.blockParams = i || 0,
            u
        }
        function p(e, t, n) {
            return e ? !e.call && !n.name && (n.name = e,
            e = n.partials[e]) : e = n.partials[n.name],
            e
        }
        function d(e, t, n) {
            n.partial = !0;
            if (e === undefined)
                throw new a["default"]("The partial " + n.name + " could not be found");
            if (e instanceof Function)
                return e(t, n)
        }
        function v() {
            return ""
        }
        function m(e, t) {
            if (!t || !("root"in t))
                t = t ? f.createFrame(t) : {},
                t.root = e;
            return t
        }
        var r = n(9)["default"]
          , i = n(8)["default"];
        t.__esModule = !0,
        t.checkRevision = l,
        t.template = c,
        t.wrapProgram = h,
        t.resolvePartial = p,
        t.invokePartial = d,
        t.noop = v;
        var s = n(13)
          , o = r(s)
          , u = n(12)
          , a = i(u)
          , f = n(10)
    }
    , function(e, t, n) {
        "use strict";
        t.__esModule = !0;
        var r = function() {
            function n() {
                this.yy = {}
            }
            var e = {
                trace: function() {},
                yy: {},
                symbols_: {
                    error: 2,
                    root: 3,
                    program: 4,
                    EOF: 5,
                    program_repetition0: 6,
                    statement: 7,
                    mustache: 8,
                    block: 9,
                    rawBlock: 10,
                    partial: 11,
                    content: 12,
                    COMMENT: 13,
                    CONTENT: 14,
                    openRawBlock: 15,
                    END_RAW_BLOCK: 16,
                    OPEN_RAW_BLOCK: 17,
                    helperName: 18,
                    openRawBlock_repetition0: 19,
                    openRawBlock_option0: 20,
                    CLOSE_RAW_BLOCK: 21,
                    openBlock: 22,
                    block_option0: 23,
                    closeBlock: 24,
                    openInverse: 25,
                    block_option1: 26,
                    OPEN_BLOCK: 27,
                    openBlock_repetition0: 28,
                    openBlock_option0: 29,
                    openBlock_option1: 30,
                    CLOSE: 31,
                    OPEN_INVERSE: 32,
                    openInverse_repetition0: 33,
                    openInverse_option0: 34,
                    openInverse_option1: 35,
                    openInverseChain: 36,
                    OPEN_INVERSE_CHAIN: 37,
                    openInverseChain_repetition0: 38,
                    openInverseChain_option0: 39,
                    openInverseChain_option1: 40,
                    inverseAndProgram: 41,
                    INVERSE: 42,
                    inverseChain: 43,
                    inverseChain_option0: 44,
                    OPEN_ENDBLOCK: 45,
                    OPEN: 46,
                    mustache_repetition0: 47,
                    mustache_option0: 48,
                    OPEN_UNESCAPED: 49,
                    mustache_repetition1: 50,
                    mustache_option1: 51,
                    CLOSE_UNESCAPED: 52,
                    OPEN_PARTIAL: 53,
                    partialName: 54,
                    partial_repetition0: 55,
                    partial_option0: 56,
                    param: 57,
                    sexpr: 58,
                    OPEN_SEXPR: 59,
                    sexpr_repetition0: 60,
                    sexpr_option0: 61,
                    CLOSE_SEXPR: 62,
                    hash: 63,
                    hash_repetition_plus0: 64,
                    hashSegment: 65,
                    ID: 66,
                    EQUALS: 67,
                    blockParams: 68,
                    OPEN_BLOCK_PARAMS: 69,
                    blockParams_repetition_plus0: 70,
                    CLOSE_BLOCK_PARAMS: 71,
                    path: 72,
                    dataName: 73,
                    STRING: 74,
                    NUMBER: 75,
                    BOOLEAN: 76,
                    UNDEFINED: 77,
                    NULL: 78,
                    DATA: 79,
                    pathSegments: 80,
                    SEP: 81,
                    $accept: 0,
                    $end: 1
                },
                terminals_: {
                    2: "error",
                    5: "EOF",
                    13: "COMMENT",
                    14: "CONTENT",
                    16: "END_RAW_BLOCK",
                    17: "OPEN_RAW_BLOCK",
                    21: "CLOSE_RAW_BLOCK",
                    27: "OPEN_BLOCK",
                    31: "CLOSE",
                    32: "OPEN_INVERSE",
                    37: "OPEN_INVERSE_CHAIN",
                    42: "INVERSE",
                    45: "OPEN_ENDBLOCK",
                    46: "OPEN",
                    49: "OPEN_UNESCAPED",
                    52: "CLOSE_UNESCAPED",
                    53: "OPEN_PARTIAL",
                    59: "OPEN_SEXPR",
                    62: "CLOSE_SEXPR",
                    66: "ID",
                    67: "EQUALS",
                    69: "OPEN_BLOCK_PARAMS",
                    71: "CLOSE_BLOCK_PARAMS",
                    74: "STRING",
                    75: "NUMBER",
                    76: "BOOLEAN",
                    77: "UNDEFINED",
                    78: "NULL",
                    79: "DATA",
                    81: "SEP"
                },
                productions_: [0, [3, 2], [4, 1], [7, 1], [7, 1], [7, 1], [7, 1], [7, 1], [7, 1], [12, 1], [10, 3], [15, 5], [9, 4], [9, 4], [22, 6], [25, 6], [36, 6], [41, 2], [43, 3], [43, 1], [24, 3], [8, 5], [8, 5], [11, 5], [57, 1], [57, 1], [58, 5], [63, 1], [65, 3], [68, 3], [18, 1], [18, 1], [18, 1], [18, 1], [18, 1], [18, 1], [18, 1], [54, 1], [54, 1], [73, 2], [72, 1], [80, 3], [80, 1], [6, 0], [6, 2], [19, 0], [19, 2], [20, 0], [20, 1], [23, 0], [23, 1], [26, 0], [26, 1], [28, 0], [28, 2], [29, 0], [29, 1], [30, 0], [30, 1], [33, 0], [33, 2], [34, 0], [34, 1], [35, 0], [35, 1], [38, 0], [38, 2], [39, 0], [39, 1], [40, 0], [40, 1], [44, 0], [44, 1], [47, 0], [47, 2], [48, 0], [48, 1], [50, 0], [50, 2], [51, 0], [51, 1], [55, 0], [55, 2], [56, 0], [56, 1], [60, 0], [60, 2], [61, 0], [61, 1], [64, 1], [64, 2], [70, 1], [70, 2]],
                performAction: function(t, n, r, i, s, o, u) {
                    var a = o.length - 1;
                    switch (s) {
                    case 1:
                        return o[a - 1];
                    case 2:
                        this.$ = new i.Program(o[a],null,{},i.locInfo(this._$));
                        break;
                    case 3:
                        this.$ = o[a];
                        break;
                    case 4:
                        this.$ = o[a];
                        break;
                    case 5:
                        this.$ = o[a];
                        break;
                    case 6:
                        this.$ = o[a];
                        break;
                    case 7:
                        this.$ = o[a];
                        break;
                    case 8:
                        this.$ = new i.CommentStatement(i.stripComment(o[a]),i.stripFlags(o[a], o[a]),i.locInfo(this._$));
                        break;
                    case 9:
                        this.$ = new i.ContentStatement(o[a],i.locInfo(this._$));
                        break;
                    case 10:
                        this.$ = i.prepareRawBlock(o[a - 2], o[a - 1], o[a], this._$);
                        break;
                    case 11:
                        this.$ = {
                            path: o[a - 3],
                            params: o[a - 2],
                            hash: o[a - 1]
                        };
                        break;
                    case 12:
                        this.$ = i.prepareBlock(o[a - 3], o[a - 2], o[a - 1], o[a], !1, this._$);
                        break;
                    case 13:
                        this.$ = i.prepareBlock(o[a - 3], o[a - 2], o[a - 1], o[a], !0, this._$);
                        break;
                    case 14:
                        this.$ = {
                            path: o[a - 4],
                            params: o[a - 3],
                            hash: o[a - 2],
                            blockParams: o[a - 1],
                            strip: i.stripFlags(o[a - 5], o[a])
                        };
                        break;
                    case 15:
                        this.$ = {
                            path: o[a - 4],
                            params: o[a - 3],
                            hash: o[a - 2],
                            blockParams: o[a - 1],
                            strip: i.stripFlags(o[a - 5], o[a])
                        };
                        break;
                    case 16:
                        this.$ = {
                            path: o[a - 4],
                            params: o[a - 3],
                            hash: o[a - 2],
                            blockParams: o[a - 1],
                            strip: i.stripFlags(o[a - 5], o[a])
                        };
                        break;
                    case 17:
                        this.$ = {
                            strip: i.stripFlags(o[a - 1], o[a - 1]),
                            program: o[a]
                        };
                        break;
                    case 18:
                        var f = i.prepareBlock(o[a - 2], o[a - 1], o[a], o[a], !1, this._$)
                          , l = new i.Program([f],null,{},i.locInfo(this._$));
                        l.chained = !0,
                        this.$ = {
                            strip: o[a - 2].strip,
                            program: l,
                            chain: !0
                        };
                        break;
                    case 19:
                        this.$ = o[a];
                        break;
                    case 20:
                        this.$ = {
                            path: o[a - 1],
                            strip: i.stripFlags(o[a - 2], o[a])
                        };
                        break;
                    case 21:
                        this.$ = i.prepareMustache(o[a - 3], o[a - 2], o[a - 1], o[a - 4], i.stripFlags(o[a - 4], o[a]), this._$);
                        break;
                    case 22:
                        this.$ = i.prepareMustache(o[a - 3], o[a - 2], o[a - 1], o[a - 4], i.stripFlags(o[a - 4], o[a]), this._$);
                        break;
                    case 23:
                        this.$ = new i.PartialStatement(o[a - 3],o[a - 2],o[a - 1],i.stripFlags(o[a - 4], o[a]),i.locInfo(this._$));
                        break;
                    case 24:
                        this.$ = o[a];
                        break;
                    case 25:
                        this.$ = o[a];
                        break;
                    case 26:
                        this.$ = new i.SubExpression(o[a - 3],o[a - 2],o[a - 1],i.locInfo(this._$));
                        break;
                    case 27:
                        this.$ = new i.Hash(o[a],i.locInfo(this._$));
                        break;
                    case 28:
                        this.$ = new i.HashPair(i.id(o[a - 2]),o[a],i.locInfo(this._$));
                        break;
                    case 29:
                        this.$ = i.id(o[a - 1]);
                        break;
                    case 30:
                        this.$ = o[a];
                        break;
                    case 31:
                        this.$ = o[a];
                        break;
                    case 32:
                        this.$ = new i.StringLiteral(o[a],i.locInfo(this._$));
                        break;
                    case 33:
                        this.$ = new i.NumberLiteral(o[a],i.locInfo(this._$));
                        break;
                    case 34:
                        this.$ = new i.BooleanLiteral(o[a],i.locInfo(this._$));
                        break;
                    case 35:
                        this.$ = new i.UndefinedLiteral(i.locInfo(this._$));
                        break;
                    case 36:
                        this.$ = new i.NullLiteral(i.locInfo(this._$));
                        break;
                    case 37:
                        this.$ = o[a];
                        break;
                    case 38:
                        this.$ = o[a];
                        break;
                    case 39:
                        this.$ = i.preparePath(!0, o[a], this._$);
                        break;
                    case 40:
                        this.$ = i.preparePath(!1, o[a], this._$);
                        break;
                    case 41:
                        o[a - 2].push({
                            part: i.id(o[a]),
                            original: o[a],
                            separator: o[a - 1]
                        }),
                        this.$ = o[a - 2];
                        break;
                    case 42:
                        this.$ = [{
                            part: i.id(o[a]),
                            original: o[a]
                        }];
                        break;
                    case 43:
                        this.$ = [];
                        break;
                    case 44:
                        o[a - 1].push(o[a]);
                        break;
                    case 45:
                        this.$ = [];
                        break;
                    case 46:
                        o[a - 1].push(o[a]);
                        break;
                    case 53:
                        this.$ = [];
                        break;
                    case 54:
                        o[a - 1].push(o[a]);
                        break;
                    case 59:
                        this.$ = [];
                        break;
                    case 60:
                        o[a - 1].push(o[a]);
                        break;
                    case 65:
                        this.$ = [];
                        break;
                    case 66:
                        o[a - 1].push(o[a]);
                        break;
                    case 73:
                        this.$ = [];
                        break;
                    case 74:
                        o[a - 1].push(o[a]);
                        break;
                    case 77:
                        this.$ = [];
                        break;
                    case 78:
                        o[a - 1].push(o[a]);
                        break;
                    case 81:
                        this.$ = [];
                        break;
                    case 82:
                        o[a - 1].push(o[a]);
                        break;
                    case 85:
                        this.$ = [];
                        break;
                    case 86:
                        o[a - 1].push(o[a]);
                        break;
                    case 89:
                        this.$ = [o[a]];
                        break;
                    case 90:
                        o[a - 1].push(o[a]);
                        break;
                    case 91:
                        this.$ = [o[a]];
                        break;
                    case 92:
                        o[a - 1].push(o[a])
                    }
                },
                table: [{
                    3: 1,
                    4: 2,
                    5: [2, 43],
                    6: 3,
                    13: [2, 43],
                    14: [2, 43],
                    17: [2, 43],
                    27: [2, 43],
                    32: [2, 43],
                    46: [2, 43],
                    49: [2, 43],
                    53: [2, 43]
                }, {
                    1: [3]
                }, {
                    5: [1, 4]
                }, {
                    5: [2, 2],
                    7: 5,
                    8: 6,
                    9: 7,
                    10: 8,
                    11: 9,
                    12: 10,
                    13: [1, 11],
                    14: [1, 18],
                    15: 16,
                    17: [1, 21],
                    22: 14,
                    25: 15,
                    27: [1, 19],
                    32: [1, 20],
                    37: [2, 2],
                    42: [2, 2],
                    45: [2, 2],
                    46: [1, 12],
                    49: [1, 13],
                    53: [1, 17]
                }, {
                    1: [2, 1]
                }, {
                    5: [2, 44],
                    13: [2, 44],
                    14: [2, 44],
                    17: [2, 44],
                    27: [2, 44],
                    32: [2, 44],
                    37: [2, 44],
                    42: [2, 44],
                    45: [2, 44],
                    46: [2, 44],
                    49: [2, 44],
                    53: [2, 44]
                }, {
                    5: [2, 3],
                    13: [2, 3],
                    14: [2, 3],
                    17: [2, 3],
                    27: [2, 3],
                    32: [2, 3],
                    37: [2, 3],
                    42: [2, 3],
                    45: [2, 3],
                    46: [2, 3],
                    49: [2, 3],
                    53: [2, 3]
                }, {
                    5: [2, 4],
                    13: [2, 4],
                    14: [2, 4],
                    17: [2, 4],
                    27: [2, 4],
                    32: [2, 4],
                    37: [2, 4],
                    42: [2, 4],
                    45: [2, 4],
                    46: [2, 4],
                    49: [2, 4],
                    53: [2, 4]
                }, {
                    5: [2, 5],
                    13: [2, 5],
                    14: [2, 5],
                    17: [2, 5],
                    27: [2, 5],
                    32: [2, 5],
                    37: [2, 5],
                    42: [2, 5],
                    45: [2, 5],
                    46: [2, 5],
                    49: [2, 5],
                    53: [2, 5]
                }, {
                    5: [2, 6],
                    13: [2, 6],
                    14: [2, 6],
                    17: [2, 6],
                    27: [2, 6],
                    32: [2, 6],
                    37: [2, 6],
                    42: [2, 6],
                    45: [2, 6],
                    46: [2, 6],
                    49: [2, 6],
                    53: [2, 6]
                }, {
                    5: [2, 7],
                    13: [2, 7],
                    14: [2, 7],
                    17: [2, 7],
                    27: [2, 7],
                    32: [2, 7],
                    37: [2, 7],
                    42: [2, 7],
                    45: [2, 7],
                    46: [2, 7],
                    49: [2, 7],
                    53: [2, 7]
                }, {
                    5: [2, 8],
                    13: [2, 8],
                    14: [2, 8],
                    17: [2, 8],
                    27: [2, 8],
                    32: [2, 8],
                    37: [2, 8],
                    42: [2, 8],
                    45: [2, 8],
                    46: [2, 8],
                    49: [2, 8],
                    53: [2, 8]
                }, {
                    18: 22,
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    18: 33,
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    4: 34,
                    6: 3,
                    13: [2, 43],
                    14: [2, 43],
                    17: [2, 43],
                    27: [2, 43],
                    32: [2, 43],
                    37: [2, 43],
                    42: [2, 43],
                    45: [2, 43],
                    46: [2, 43],
                    49: [2, 43],
                    53: [2, 43]
                }, {
                    4: 35,
                    6: 3,
                    13: [2, 43],
                    14: [2, 43],
                    17: [2, 43],
                    27: [2, 43],
                    32: [2, 43],
                    42: [2, 43],
                    45: [2, 43],
                    46: [2, 43],
                    49: [2, 43],
                    53: [2, 43]
                }, {
                    12: 36,
                    14: [1, 18]
                }, {
                    18: 38,
                    54: 37,
                    58: 39,
                    59: [1, 40],
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    5: [2, 9],
                    13: [2, 9],
                    14: [2, 9],
                    16: [2, 9],
                    17: [2, 9],
                    27: [2, 9],
                    32: [2, 9],
                    37: [2, 9],
                    42: [2, 9],
                    45: [2, 9],
                    46: [2, 9],
                    49: [2, 9],
                    53: [2, 9]
                }, {
                    18: 41,
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    18: 42,
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    18: 43,
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    31: [2, 73],
                    47: 44,
                    59: [2, 73],
                    66: [2, 73],
                    74: [2, 73],
                    75: [2, 73],
                    76: [2, 73],
                    77: [2, 73],
                    78: [2, 73],
                    79: [2, 73]
                }, {
                    21: [2, 30],
                    31: [2, 30],
                    52: [2, 30],
                    59: [2, 30],
                    62: [2, 30],
                    66: [2, 30],
                    69: [2, 30],
                    74: [2, 30],
                    75: [2, 30],
                    76: [2, 30],
                    77: [2, 30],
                    78: [2, 30],
                    79: [2, 30]
                }, {
                    21: [2, 31],
                    31: [2, 31],
                    52: [2, 31],
                    59: [2, 31],
                    62: [2, 31],
                    66: [2, 31],
                    69: [2, 31],
                    74: [2, 31],
                    75: [2, 31],
                    76: [2, 31],
                    77: [2, 31],
                    78: [2, 31],
                    79: [2, 31]
                }, {
                    21: [2, 32],
                    31: [2, 32],
                    52: [2, 32],
                    59: [2, 32],
                    62: [2, 32],
                    66: [2, 32],
                    69: [2, 32],
                    74: [2, 32],
                    75: [2, 32],
                    76: [2, 32],
                    77: [2, 32],
                    78: [2, 32],
                    79: [2, 32]
                }, {
                    21: [2, 33],
                    31: [2, 33],
                    52: [2, 33],
                    59: [2, 33],
                    62: [2, 33],
                    66: [2, 33],
                    69: [2, 33],
                    74: [2, 33],
                    75: [2, 33],
                    76: [2, 33],
                    77: [2, 33],
                    78: [2, 33],
                    79: [2, 33]
                }, {
                    21: [2, 34],
                    31: [2, 34],
                    52: [2, 34],
                    59: [2, 34],
                    62: [2, 34],
                    66: [2, 34],
                    69: [2, 34],
                    74: [2, 34],
                    75: [2, 34],
                    76: [2, 34],
                    77: [2, 34],
                    78: [2, 34],
                    79: [2, 34]
                }, {
                    21: [2, 35],
                    31: [2, 35],
                    52: [2, 35],
                    59: [2, 35],
                    62: [2, 35],
                    66: [2, 35],
                    69: [2, 35],
                    74: [2, 35],
                    75: [2, 35],
                    76: [2, 35],
                    77: [2, 35],
                    78: [2, 35],
                    79: [2, 35]
                }, {
                    21: [2, 36],
                    31: [2, 36],
                    52: [2, 36],
                    59: [2, 36],
                    62: [2, 36],
                    66: [2, 36],
                    69: [2, 36],
                    74: [2, 36],
                    75: [2, 36],
                    76: [2, 36],
                    77: [2, 36],
                    78: [2, 36],
                    79: [2, 36]
                }, {
                    21: [2, 40],
                    31: [2, 40],
                    52: [2, 40],
                    59: [2, 40],
                    62: [2, 40],
                    66: [2, 40],
                    69: [2, 40],
                    74: [2, 40],
                    75: [2, 40],
                    76: [2, 40],
                    77: [2, 40],
                    78: [2, 40],
                    79: [2, 40],
                    81: [1, 45]
                }, {
                    66: [1, 32],
                    80: 46
                }, {
                    21: [2, 42],
                    31: [2, 42],
                    52: [2, 42],
                    59: [2, 42],
                    62: [2, 42],
                    66: [2, 42],
                    69: [2, 42],
                    74: [2, 42],
                    75: [2, 42],
                    76: [2, 42],
                    77: [2, 42],
                    78: [2, 42],
                    79: [2, 42],
                    81: [2, 42]
                }, {
                    50: 47,
                    52: [2, 77],
                    59: [2, 77],
                    66: [2, 77],
                    74: [2, 77],
                    75: [2, 77],
                    76: [2, 77],
                    77: [2, 77],
                    78: [2, 77],
                    79: [2, 77]
                }, {
                    23: 48,
                    36: 50,
                    37: [1, 52],
                    41: 51,
                    42: [1, 53],
                    43: 49,
                    45: [2, 49]
                }, {
                    26: 54,
                    41: 55,
                    42: [1, 53],
                    45: [2, 51]
                }, {
                    16: [1, 56]
                }, {
                    31: [2, 81],
                    55: 57,
                    59: [2, 81],
                    66: [2, 81],
                    74: [2, 81],
                    75: [2, 81],
                    76: [2, 81],
                    77: [2, 81],
                    78: [2, 81],
                    79: [2, 81]
                }, {
                    31: [2, 37],
                    59: [2, 37],
                    66: [2, 37],
                    74: [2, 37],
                    75: [2, 37],
                    76: [2, 37],
                    77: [2, 37],
                    78: [2, 37],
                    79: [2, 37]
                }, {
                    31: [2, 38],
                    59: [2, 38],
                    66: [2, 38],
                    74: [2, 38],
                    75: [2, 38],
                    76: [2, 38],
                    77: [2, 38],
                    78: [2, 38],
                    79: [2, 38]
                }, {
                    18: 58,
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    28: 59,
                    31: [2, 53],
                    59: [2, 53],
                    66: [2, 53],
                    69: [2, 53],
                    74: [2, 53],
                    75: [2, 53],
                    76: [2, 53],
                    77: [2, 53],
                    78: [2, 53],
                    79: [2, 53]
                }, {
                    31: [2, 59],
                    33: 60,
                    59: [2, 59],
                    66: [2, 59],
                    69: [2, 59],
                    74: [2, 59],
                    75: [2, 59],
                    76: [2, 59],
                    77: [2, 59],
                    78: [2, 59],
                    79: [2, 59]
                }, {
                    19: 61,
                    21: [2, 45],
                    59: [2, 45],
                    66: [2, 45],
                    74: [2, 45],
                    75: [2, 45],
                    76: [2, 45],
                    77: [2, 45],
                    78: [2, 45],
                    79: [2, 45]
                }, {
                    18: 65,
                    31: [2, 75],
                    48: 62,
                    57: 63,
                    58: 66,
                    59: [1, 40],
                    63: 64,
                    64: 67,
                    65: 68,
                    66: [1, 69],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    66: [1, 70]
                }, {
                    21: [2, 39],
                    31: [2, 39],
                    52: [2, 39],
                    59: [2, 39],
                    62: [2, 39],
                    66: [2, 39],
                    69: [2, 39],
                    74: [2, 39],
                    75: [2, 39],
                    76: [2, 39],
                    77: [2, 39],
                    78: [2, 39],
                    79: [2, 39],
                    81: [1, 45]
                }, {
                    18: 65,
                    51: 71,
                    52: [2, 79],
                    57: 72,
                    58: 66,
                    59: [1, 40],
                    63: 73,
                    64: 67,
                    65: 68,
                    66: [1, 69],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    24: 74,
                    45: [1, 75]
                }, {
                    45: [2, 50]
                }, {
                    4: 76,
                    6: 3,
                    13: [2, 43],
                    14: [2, 43],
                    17: [2, 43],
                    27: [2, 43],
                    32: [2, 43],
                    37: [2, 43],
                    42: [2, 43],
                    45: [2, 43],
                    46: [2, 43],
                    49: [2, 43],
                    53: [2, 43]
                }, {
                    45: [2, 19]
                }, {
                    18: 77,
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    4: 78,
                    6: 3,
                    13: [2, 43],
                    14: [2, 43],
                    17: [2, 43],
                    27: [2, 43],
                    32: [2, 43],
                    45: [2, 43],
                    46: [2, 43],
                    49: [2, 43],
                    53: [2, 43]
                }, {
                    24: 79,
                    45: [1, 75]
                }, {
                    45: [2, 52]
                }, {
                    5: [2, 10],
                    13: [2, 10],
                    14: [2, 10],
                    17: [2, 10],
                    27: [2, 10],
                    32: [2, 10],
                    37: [2, 10],
                    42: [2, 10],
                    45: [2, 10],
                    46: [2, 10],
                    49: [2, 10],
                    53: [2, 10]
                }, {
                    18: 65,
                    31: [2, 83],
                    56: 80,
                    57: 81,
                    58: 66,
                    59: [1, 40],
                    63: 82,
                    64: 67,
                    65: 68,
                    66: [1, 69],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    59: [2, 85],
                    60: 83,
                    62: [2, 85],
                    66: [2, 85],
                    74: [2, 85],
                    75: [2, 85],
                    76: [2, 85],
                    77: [2, 85],
                    78: [2, 85],
                    79: [2, 85]
                }, {
                    18: 65,
                    29: 84,
                    31: [2, 55],
                    57: 85,
                    58: 66,
                    59: [1, 40],
                    63: 86,
                    64: 67,
                    65: 68,
                    66: [1, 69],
                    69: [2, 55],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    18: 65,
                    31: [2, 61],
                    34: 87,
                    57: 88,
                    58: 66,
                    59: [1, 40],
                    63: 89,
                    64: 67,
                    65: 68,
                    66: [1, 69],
                    69: [2, 61],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    18: 65,
                    20: 90,
                    21: [2, 47],
                    57: 91,
                    58: 66,
                    59: [1, 40],
                    63: 92,
                    64: 67,
                    65: 68,
                    66: [1, 69],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    31: [1, 93]
                }, {
                    31: [2, 74],
                    59: [2, 74],
                    66: [2, 74],
                    74: [2, 74],
                    75: [2, 74],
                    76: [2, 74],
                    77: [2, 74],
                    78: [2, 74],
                    79: [2, 74]
                }, {
                    31: [2, 76]
                }, {
                    21: [2, 24],
                    31: [2, 24],
                    52: [2, 24],
                    59: [2, 24],
                    62: [2, 24],
                    66: [2, 24],
                    69: [2, 24],
                    74: [2, 24],
                    75: [2, 24],
                    76: [2, 24],
                    77: [2, 24],
                    78: [2, 24],
                    79: [2, 24]
                }, {
                    21: [2, 25],
                    31: [2, 25],
                    52: [2, 25],
                    59: [2, 25],
                    62: [2, 25],
                    66: [2, 25],
                    69: [2, 25],
                    74: [2, 25],
                    75: [2, 25],
                    76: [2, 25],
                    77: [2, 25],
                    78: [2, 25],
                    79: [2, 25]
                }, {
                    21: [2, 27],
                    31: [2, 27],
                    52: [2, 27],
                    62: [2, 27],
                    65: 94,
                    66: [1, 95],
                    69: [2, 27]
                }, {
                    21: [2, 89],
                    31: [2, 89],
                    52: [2, 89],
                    62: [2, 89],
                    66: [2, 89],
                    69: [2, 89]
                }, {
                    21: [2, 42],
                    31: [2, 42],
                    52: [2, 42],
                    59: [2, 42],
                    62: [2, 42],
                    66: [2, 42],
                    67: [1, 96],
                    69: [2, 42],
                    74: [2, 42],
                    75: [2, 42],
                    76: [2, 42],
                    77: [2, 42],
                    78: [2, 42],
                    79: [2, 42],
                    81: [2, 42]
                }, {
                    21: [2, 41],
                    31: [2, 41],
                    52: [2, 41],
                    59: [2, 41],
                    62: [2, 41],
                    66: [2, 41],
                    69: [2, 41],
                    74: [2, 41],
                    75: [2, 41],
                    76: [2, 41],
                    77: [2, 41],
                    78: [2, 41],
                    79: [2, 41],
                    81: [2, 41]
                }, {
                    52: [1, 97]
                }, {
                    52: [2, 78],
                    59: [2, 78],
                    66: [2, 78],
                    74: [2, 78],
                    75: [2, 78],
                    76: [2, 78],
                    77: [2, 78],
                    78: [2, 78],
                    79: [2, 78]
                }, {
                    52: [2, 80]
                }, {
                    5: [2, 12],
                    13: [2, 12],
                    14: [2, 12],
                    17: [2, 12],
                    27: [2, 12],
                    32: [2, 12],
                    37: [2, 12],
                    42: [2, 12],
                    45: [2, 12],
                    46: [2, 12],
                    49: [2, 12],
                    53: [2, 12]
                }, {
                    18: 98,
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    36: 50,
                    37: [1, 52],
                    41: 51,
                    42: [1, 53],
                    43: 100,
                    44: 99,
                    45: [2, 71]
                }, {
                    31: [2, 65],
                    38: 101,
                    59: [2, 65],
                    66: [2, 65],
                    69: [2, 65],
                    74: [2, 65],
                    75: [2, 65],
                    76: [2, 65],
                    77: [2, 65],
                    78: [2, 65],
                    79: [2, 65]
                }, {
                    45: [2, 17]
                }, {
                    5: [2, 13],
                    13: [2, 13],
                    14: [2, 13],
                    17: [2, 13],
                    27: [2, 13],
                    32: [2, 13],
                    37: [2, 13],
                    42: [2, 13],
                    45: [2, 13],
                    46: [2, 13],
                    49: [2, 13],
                    53: [2, 13]
                }, {
                    31: [1, 102]
                }, {
                    31: [2, 82],
                    59: [2, 82],
                    66: [2, 82],
                    74: [2, 82],
                    75: [2, 82],
                    76: [2, 82],
                    77: [2, 82],
                    78: [2, 82],
                    79: [2, 82]
                }, {
                    31: [2, 84]
                }, {
                    18: 65,
                    57: 104,
                    58: 66,
                    59: [1, 40],
                    61: 103,
                    62: [2, 87],
                    63: 105,
                    64: 67,
                    65: 68,
                    66: [1, 69],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    30: 106,
                    31: [2, 57],
                    68: 107,
                    69: [1, 108]
                }, {
                    31: [2, 54],
                    59: [2, 54],
                    66: [2, 54],
                    69: [2, 54],
                    74: [2, 54],
                    75: [2, 54],
                    76: [2, 54],
                    77: [2, 54],
                    78: [2, 54],
                    79: [2, 54]
                }, {
                    31: [2, 56],
                    69: [2, 56]
                }, {
                    31: [2, 63],
                    35: 109,
                    68: 110,
                    69: [1, 108]
                }, {
                    31: [2, 60],
                    59: [2, 60],
                    66: [2, 60],
                    69: [2, 60],
                    74: [2, 60],
                    75: [2, 60],
                    76: [2, 60],
                    77: [2, 60],
                    78: [2, 60],
                    79: [2, 60]
                }, {
                    31: [2, 62],
                    69: [2, 62]
                }, {
                    21: [1, 111]
                }, {
                    21: [2, 46],
                    59: [2, 46],
                    66: [2, 46],
                    74: [2, 46],
                    75: [2, 46],
                    76: [2, 46],
                    77: [2, 46],
                    78: [2, 46],
                    79: [2, 46]
                }, {
                    21: [2, 48]
                }, {
                    5: [2, 21],
                    13: [2, 21],
                    14: [2, 21],
                    17: [2, 21],
                    27: [2, 21],
                    32: [2, 21],
                    37: [2, 21],
                    42: [2, 21],
                    45: [2, 21],
                    46: [2, 21],
                    49: [2, 21],
                    53: [2, 21]
                }, {
                    21: [2, 90],
                    31: [2, 90],
                    52: [2, 90],
                    62: [2, 90],
                    66: [2, 90],
                    69: [2, 90]
                }, {
                    67: [1, 96]
                }, {
                    18: 65,
                    57: 112,
                    58: 66,
                    59: [1, 40],
                    66: [1, 32],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    5: [2, 22],
                    13: [2, 22],
                    14: [2, 22],
                    17: [2, 22],
                    27: [2, 22],
                    32: [2, 22],
                    37: [2, 22],
                    42: [2, 22],
                    45: [2, 22],
                    46: [2, 22],
                    49: [2, 22],
                    53: [2, 22]
                }, {
                    31: [1, 113]
                }, {
                    45: [2, 18]
                }, {
                    45: [2, 72]
                }, {
                    18: 65,
                    31: [2, 67],
                    39: 114,
                    57: 115,
                    58: 66,
                    59: [1, 40],
                    63: 116,
                    64: 67,
                    65: 68,
                    66: [1, 69],
                    69: [2, 67],
                    72: 23,
                    73: 24,
                    74: [1, 25],
                    75: [1, 26],
                    76: [1, 27],
                    77: [1, 28],
                    78: [1, 29],
                    79: [1, 31],
                    80: 30
                }, {
                    5: [2, 23],
                    13: [2, 23],
                    14: [2, 23],
                    17: [2, 23],
                    27: [2, 23],
                    32: [2, 23],
                    37: [2, 23],
                    42: [2, 23],
                    45: [2, 23],
                    46: [2, 23],
                    49: [2, 23],
                    53: [2, 23]
                }, {
                    62: [1, 117]
                }, {
                    59: [2, 86],
                    62: [2, 86],
                    66: [2, 86],
                    74: [2, 86],
                    75: [2, 86],
                    76: [2, 86],
                    77: [2, 86],
                    78: [2, 86],
                    79: [2, 86]
                }, {
                    62: [2, 88]
                }, {
                    31: [1, 118]
                }, {
                    31: [2, 58]
                }, {
                    66: [1, 120],
                    70: 119
                }, {
                    31: [1, 121]
                }, {
                    31: [2, 64]
                }, {
                    14: [2, 11]
                }, {
                    21: [2, 28],
                    31: [2, 28],
                    52: [2, 28],
                    62: [2, 28],
                    66: [2, 28],
                    69: [2, 28]
                }, {
                    5: [2, 20],
                    13: [2, 20],
                    14: [2, 20],
                    17: [2, 20],
                    27: [2, 20],
                    32: [2, 20],
                    37: [2, 20],
                    42: [2, 20],
                    45: [2, 20],
                    46: [2, 20],
                    49: [2, 20],
                    53: [2, 20]
                }, {
                    31: [2, 69],
                    40: 122,
                    68: 123,
                    69: [1, 108]
                }, {
                    31: [2, 66],
                    59: [2, 66],
                    66: [2, 66],
                    69: [2, 66],
                    74: [2, 66],
                    75: [2, 66],
                    76: [2, 66],
                    77: [2, 66],
                    78: [2, 66],
                    79: [2, 66]
                }, {
                    31: [2, 68],
                    69: [2, 68]
                }, {
                    21: [2, 26],
                    31: [2, 26],
                    52: [2, 26],
                    59: [2, 26],
                    62: [2, 26],
                    66: [2, 26],
                    69: [2, 26],
                    74: [2, 26],
                    75: [2, 26],
                    76: [2, 26],
                    77: [2, 26],
                    78: [2, 26],
                    79: [2, 26]
                }, {
                    13: [2, 14],
                    14: [2, 14],
                    17: [2, 14],
                    27: [2, 14],
                    32: [2, 14],
                    37: [2, 14],
                    42: [2, 14],
                    45: [2, 14],
                    46: [2, 14],
                    49: [2, 14],
                    53: [2, 14]
                }, {
                    66: [1, 125],
                    71: [1, 124]
                }, {
                    66: [2, 91],
                    71: [2, 91]
                }, {
                    13: [2, 15],
                    14: [2, 15],
                    17: [2, 15],
                    27: [2, 15],
                    32: [2, 15],
                    42: [2, 15],
                    45: [2, 15],
                    46: [2, 15],
                    49: [2, 15],
                    53: [2, 15]
                }, {
                    31: [1, 126]
                }, {
                    31: [2, 70]
                }, {
                    31: [2, 29]
                }, {
                    66: [2, 92],
                    71: [2, 92]
                }, {
                    13: [2, 16],
                    14: [2, 16],
                    17: [2, 16],
                    27: [2, 16],
                    32: [2, 16],
                    37: [2, 16],
                    42: [2, 16],
                    45: [2, 16],
                    46: [2, 16],
                    49: [2, 16],
                    53: [2, 16]
                }],
                defaultActions: {
                    4: [2, 1],
                    49: [2, 50],
                    51: [2, 19],
                    55: [2, 52],
                    64: [2, 76],
                    73: [2, 80],
                    78: [2, 17],
                    82: [2, 84],
                    92: [2, 48],
                    99: [2, 18],
                    100: [2, 72],
                    105: [2, 88],
                    107: [2, 58],
                    110: [2, 64],
                    111: [2, 11],
                    123: [2, 70],
                    124: [2, 29]
                },
                parseError: function(t, n) {
                    throw new Error(t)
                },
                parse: function(t) {
                    function v(e) {
                        r.length = r.length - 2 * e,
                        i.length = i.length - e,
                        s.length = s.length - e
                    }
                    function m() {
                        var e;
                        return e = n.lexer.lex() || 1,
                        typeof e != "number" && (e = n.symbols_[e] || e),
                        e
                    }
                    var n = this
                      , r = [0]
                      , i = [null]
                      , s = []
                      , o = this.table
                      , u = ""
                      , a = 0
                      , f = 0
                      , l = 0
                      , c = 2
                      , h = 1;
                    this.lexer.setInput(t),
                    this.lexer.yy = this.yy,
                    this.yy.lexer = this.lexer,
                    this.yy.parser = this,
                    typeof this.lexer.yylloc == "undefined" && (this.lexer.yylloc = {});
                    var p = this.lexer.yylloc;
                    s.push(p);
                    var d = this.lexer.options && this.lexer.options.ranges;
                    typeof this.yy.parseError == "function" && (this.parseError = this.yy.parseError);
                    var g, y, b, w, E, S, x = {}, T, N, C, k;
                    for (; ; ) {
                        b = r[r.length - 1];
                        if (this.defaultActions[b])
                            w = this.defaultActions[b];
                        else {
                            if (g === null || typeof g == "undefined")
                                g = m();
                            w = o[b] && o[b][g]
                        }
                        if (typeof w == "undefined" || !w.length || !w[0]) {
                            var L = "";
                            if (!l) {
                                k = [];
                                for (T in o[b])
                                    this.terminals_[T] && T > 2 && k.push("'" + this.terminals_[T] + "'");
                                this.lexer.showPosition ? L = "Parse error on line " + (a + 1) + ":\n" + this.lexer.showPosition() + "\nExpecting " + k.join(", ") + ", got '" + (this.terminals_[g] || g) + "'" : L = "Parse error on line " + (a + 1) + ": Unexpected " + (g == 1 ? "end of input" : "'" + (this.terminals_[g] || g) + "'"),
                                this.parseError(L, {
                                    text: this.lexer.match,
                                    token: this.terminals_[g] || g,
                                    line: this.lexer.yylineno,
                                    loc: p,
                                    expected: k
                                })
                            }
                        }
                        if (w[0]instanceof Array && w.length > 1)
                            throw new Error("Parse Error: multiple actions possible at state: " + b + ", token: " + g);
                        switch (w[0]) {
                        case 1:
                            r.push(g),
                            i.push(this.lexer.yytext),
                            s.push(this.lexer.yylloc),
                            r.push(w[1]),
                            g = null,
                            y ? (g = y,
                            y = null) : (f = this.lexer.yyleng,
                            u = this.lexer.yytext,
                            a = this.lexer.yylineno,
                            p = this.lexer.yylloc,
                            l > 0 && l--);
                            break;
                        case 2:
                            N = this.productions_[w[1]][1],
                            x.$ = i[i.length - N],
                            x._$ = {
                                first_line: s[s.length - (N || 1)].first_line,
                                last_line: s[s.length - 1].last_line,
                                first_column: s[s.length - (N || 1)].first_column,
                                last_column: s[s.length - 1].last_column
                            },
                            d && (x._$.range = [s[s.length - (N || 1)].range[0], s[s.length - 1].range[1]]),
                            S = this.performAction.call(x, u, f, a, this.yy, w[1], i, s);
                            if (typeof S != "undefined")
                                return S;
                            N && (r = r.slice(0, -1 * N * 2),
                            i = i.slice(0, -1 * N),
                            s = s.slice(0, -1 * N)),
                            r.push(this.productions_[w[1]][0]),
                            i.push(x.$),
                            s.push(x._$),
                            C = o[r[r.length - 2]][r[r.length - 1]],
                            r.push(C);
                            break;
                        case 3:
                            return !0
                        }
                    }
                    return !0
                }
            }
              , t = function() {
                var e = {
                    EOF: 1,
                    parseError: function(t, n) {
                        if (!this.yy.parser)
                            throw new Error(t);
                        this.yy.parser.parseError(t, n)
                    },
                    setInput: function(t) {
                        return this._input = t,
                        this._more = this._less = this.done = !1,
                        this.yylineno = this.yyleng = 0,
                        this.yytext = this.matched = this.match = "",
                        this.conditionStack = ["INITIAL"],
                        this.yylloc = {
                            first_line: 1,
                            first_column: 0,
                            last_line: 1,
                            last_column: 0
                        },
                        this.options.ranges && (this.yylloc.range = [0, 0]),
                        this.offset = 0,
                        this
                    },
                    input: function() {
                        var t = this._input[0];
                        this.yytext += t,
                        this.yyleng++,
                        this.offset++,
                        this.match += t,
                        this.matched += t;
                        var n = t.match(/(?:\r\n?|\n).*/g);
                        return n ? (this.yylineno++,
                        this.yylloc.last_line++) : this.yylloc.last_column++,
                        this.options.ranges && this.yylloc.range[1]++,
                        this._input = this._input.slice(1),
                        t
                    },
                    unput: function(t) {
                        var n = t.length
                          , r = t.split(/(?:\r\n?|\n)/g);
                        this._input = t + this._input,
                        this.yytext = this.yytext.substr(0, this.yytext.length - n - 1),
                        this.offset -= n;
                        var i = this.match.split(/(?:\r\n?|\n)/g);
                        this.match = this.match.substr(0, this.match.length - 1),
                        this.matched = this.matched.substr(0, this.matched.length - 1),
                        r.length - 1 && (this.yylineno -= r.length - 1);
                        var s = this.yylloc.range;
                        return this.yylloc = {
                            first_line: this.yylloc.first_line,
                            last_line: this.yylineno + 1,
                            first_column: this.yylloc.first_column,
                            last_column: r ? (r.length === i.length ? this.yylloc.first_column : 0) + i[i.length - r.length].length - r[0].length : this.yylloc.first_column - n
                        },
                        this.options.ranges && (this.yylloc.range = [s[0], s[0] + this.yyleng - n]),
                        this
                    },
                    more: function() {
                        return this._more = !0,
                        this
                    },
                    less: function(t) {
                        this.unput(this.match.slice(t))
                    },
                    pastInput: function() {
                        var t = this.matched.substr(0, this.matched.length - this.match.length);
                        return (t.length > 20 ? "..." : "") + t.substr(-20).replace(/\n/g, "")
                    },
                    upcomingInput: function() {
                        var t = this.match;
                        return t.length < 20 && (t += this._input.substr(0, 20 - t.length)),
                        (t.substr(0, 20) + (t.length > 20 ? "..." : "")).replace(/\n/g, "")
                    },
                    showPosition: function() {
                        var t = this.pastInput()
                          , n = (new Array(t.length + 1)).join("-");
                        return t + this.upcomingInput() + "\n" + n + "^"
                    },
                    next: function() {
                        if (this.done)
                            return this.EOF;
                        this._input || (this.done = !0);
                        var t, n, r, i, s, o;
                        this._more || (this.yytext = "",
                        this.match = "");
                        var u = this._currentRules();
                        for (var a = 0; a < u.length; a++) {
                            r = this._input.match(this.rules[u[a]]);
                            if (r && (!n || r[0].length > n[0].length)) {
                                n = r,
                                i = a;
                                if (!this.options.flex)
                                    break
                            }
                        }
                        if (n) {
                            o = n[0].match(/(?:\r\n?|\n).*/g),
                            o && (this.yylineno += o.length),
                            this.yylloc = {
                                first_line: this.yylloc.last_line,
                                last_line: this.yylineno + 1,
                                first_column: this.yylloc.last_column,
                                last_column: o ? o[o.length - 1].length - o[o.length - 1].match(/\r?\n?/)[0].length : this.yylloc.last_column + n[0].length
                            },
                            this.yytext += n[0],
                            this.match += n[0],
                            this.matches = n,
                            this.yyleng = this.yytext.length,
                            this.options.ranges && (this.yylloc.range = [this.offset, this.offset += this.yyleng]),
                            this._more = !1,
                            this._input = this._input.slice(n[0].length),
                            this.matched += n[0],
                            t = this.performAction.call(this, this.yy, this, u[i], this.conditionStack[this.conditionStack.length - 1]),
                            this.done && this._input && (this.done = !1);
                            if (t)
                                return t;
                            return
                        }
                        return this._input === "" ? this.EOF : this.parseError("Lexical error on line " + (this.yylineno + 1) + ". Unrecognized text.\n" + this.showPosition(), {
                            text: "",
                            token: null,
                            line: this.yylineno
                        })
                    },
                    lex: function() {
                        var t = this.next();
                        return typeof t != "undefined" ? t : this.lex()
                    },
                    begin: function(t) {
                        this.conditionStack.push(t)
                    },
                    popState: function() {
                        return this.conditionStack.pop()
                    },
                    _currentRules: function() {
                        return this.conditions[this.conditionStack[this.conditionStack.length - 1]].rules
                    },
                    topState: function() {
                        return this.conditionStack[this.conditionStack.length - 2]
                    },
                    pushState: function(t) {
                        this.begin(t)
                    }
                };
                return e.options = {},
                e.performAction = function(t, n, r, i) {
                    function s(e, t) {
                        return n.yytext = n.yytext.substr(e, n.yyleng - t)
                    }
                    var o = i;
                    switch (r) {
                    case 0:
                        n.yytext.slice(-2) === "\\\\" ? (s(0, 1),
                        this.begin("mu")) : n.yytext.slice(-1) === "\\" ? (s(0, 1),
                        this.begin("emu")) : this.begin("mu");
                        if (n.yytext)
                            return 14;
                        break;
                    case 1:
                        return 14;
                    case 2:
                        return this.popState(),
                        14;
                    case 3:
                        return n.yytext = n.yytext.substr(5, n.yyleng - 9),
                        this.popState(),
                        16;
                    case 4:
                        return 14;
                    case 5:
                        return this.popState(),
                        13;
                    case 6:
                        return 59;
                    case 7:
                        return 62;
                    case 8:
                        return 17;
                    case 9:
                        return this.popState(),
                        this.begin("raw"),
                        21;
                    case 10:
                        return 53;
                    case 11:
                        return 27;
                    case 12:
                        return 45;
                    case 13:
                        return this.popState(),
                        42;
                    case 14:
                        return this.popState(),
                        42;
                    case 15:
                        return 32;
                    case 16:
                        return 37;
                    case 17:
                        return 49;
                    case 18:
                        return 46;
                    case 19:
                        this.unput(n.yytext),
                        this.popState(),
                        this.begin("com");
                        break;
                    case 20:
                        return this.popState(),
                        13;
                    case 21:
                        return 46;
                    case 22:
                        return 67;
                    case 23:
                        return 66;
                    case 24:
                        return 66;
                    case 25:
                        return 81;
                    case 26:
                        break;
                    case 27:
                        return this.popState(),
                        52;
                    case 28:
                        return this.popState(),
                        31;
                    case 29:
                        return n.yytext = s(1, 2).replace(/\\"/g, '"'),
                        74;
                    case 30:
                        return n.yytext = s(1, 2).replace(/\\'/g, "'"),
                        74;
                    case 31:
                        return 79;
                    case 32:
                        return 76;
                    case 33:
                        return 76;
                    case 34:
                        return 77;
                    case 35:
                        return 78;
                    case 36:
                        return 75;
                    case 37:
                        return 69;
                    case 38:
                        return 71;
                    case 39:
                        return 66;
                    case 40:
                        return 66;
                    case 41:
                        return "INVALID";
                    case 42:
                        return 5
                    }
                }
                ,
                e.rules = [/^(?:[^\x00]*?(?=(\{\{)))/, /^(?:[^\x00]+)/, /^(?:[^\x00]{2,}?(?=(\{\{|\\\{\{|\\\\\{\{|$)))/, /^(?:\{\{\{\{\/[^\s!"#%-,\.\/;->@\[-\^`\{-~]+(?=[=}\s\/.])\}\}\}\})/, /^(?:[^\x00]*?(?=(\{\{\{\{\/)))/, /^(?:[\s\S]*?--(~)?\}\})/, /^(?:\()/, /^(?:\))/, /^(?:\{\{\{\{)/, /^(?:\}\}\}\})/, /^(?:\{\{(~)?>)/, /^(?:\{\{(~)?#)/, /^(?:\{\{(~)?\/)/, /^(?:\{\{(~)?\^\s*(~)?\}\})/, /^(?:\{\{(~)?\s*else\s*(~)?\}\})/, /^(?:\{\{(~)?\^)/, /^(?:\{\{(~)?\s*else\b)/, /^(?:\{\{(~)?\{)/, /^(?:\{\{(~)?&)/, /^(?:\{\{(~)?!--)/, /^(?:\{\{(~)?![\s\S]*?\}\})/, /^(?:\{\{(~)?)/, /^(?:=)/, /^(?:\.\.)/, /^(?:\.(?=([=~}\s\/.)|])))/, /^(?:[\/.])/, /^(?:\s+)/, /^(?:\}(~)?\}\})/, /^(?:(~)?\}\})/, /^(?:"(\\["]|[^"])*")/, /^(?:'(\\[']|[^'])*')/, /^(?:@)/, /^(?:true(?=([~}\s)])))/, /^(?:false(?=([~}\s)])))/, /^(?:undefined(?=([~}\s)])))/, /^(?:null(?=([~}\s)])))/, /^(?:-?[0-9]+(?:\.[0-9]+)?(?=([~}\s)])))/, /^(?:as\s+\|)/, /^(?:\|)/, /^(?:([^\s!"#%-,\.\/;->@\[-\^`\{-~]+(?=([=~}\s\/.)|]))))/, /^(?:\[[^\]]*\])/, /^(?:.)/, /^(?:$)/],
                e.conditions = {
                    mu: {
                        rules: [6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42],
                        inclusive: !1
                    },
                    emu: {
                        rules: [2],
                        inclusive: !1
                    },
                    com: {
                        rules: [5],
                        inclusive: !1
                    },
                    raw: {
                        rules: [3, 4],
                        inclusive: !1
                    },
                    INITIAL: {
                        rules: [0, 1, 42],
                        inclusive: !0
                    }
                },
                e
            }();
            return e.lexer = t,
            n.prototype = e,
            e.Parser = n,
            new n
        }();
        t["default"] = r,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function o() {}
        function u(e, t, n) {
            t === undefined && (t = e.length);
            var r = e[t - 1]
              , i = e[t - 2];
            if (!r)
                return n;
            if (r.type === "ContentStatement")
                return (i || !n ? /\r?\n\s*?$/ : /(^|\r?\n)\s*?$/).test(r.original)
        }
        function a(e, t, n) {
            t === undefined && (t = -1);
            var r = e[t + 1]
              , i = e[t + 2];
            if (!r)
                return n;
            if (r.type === "ContentStatement")
                return (i || !n ? /^\s*?\r?\n/ : /^\s*?(\r?\n|$)/).test(r.original)
        }
        function f(e, t, n) {
            var r = e[t == null ? 0 : t + 1];
            if (!r || r.type !== "ContentStatement" || !n && r.rightStripped)
                return;
            var i = r.value;
            r.value = r.value.replace(n ? /^\s+/ : /^[ \t]*\r?\n?/, ""),
            r.rightStripped = r.value !== i
        }
        function l(e, t, n) {
            var r = e[t == null ? e.length - 1 : t - 1];
            if (!r || r.type !== "ContentStatement" || !n && r.leftStripped)
                return;
            var i = r.value;
            return r.value = r.value.replace(n ? /\s+$/ : /[ \t]+$/, ""),
            r.leftStripped = r.value !== i,
            r.leftStripped
        }
        var r = n(8)["default"];
        t.__esModule = !0;
        var i = n(6)
          , s = r(i);
        o.prototype = new s["default"],
        o.prototype.Program = function(e) {
            var t = !this.isRootSeen;
            this.isRootSeen = !0;
            var n = e.body;
            for (var r = 0, i = n.length; r < i; r++) {
                var s = n[r]
                  , o = this.accept(s);
                if (!o)
                    continue;
                var c = u(n, r, t)
                  , h = a(n, r, t)
                  , p = o.openStandalone && c
                  , d = o.closeStandalone && h
                  , v = o.inlineStandalone && c && h;
                o.close && f(n, r, !0),
                o.open && l(n, r, !0),
                v && (f(n, r),
                l(n, r) && s.type === "PartialStatement" && (s.indent = /([ \t]+$)/.exec(n[r - 1].original)[1])),
                p && (f((s.program || s.inverse).body),
                l(n, r)),
                d && (f(n, r),
                l((s.inverse || s.program).body))
            }
            return e
        }
        ,
        o.prototype.BlockStatement = function(e) {
            this.accept(e.program),
            this.accept(e.inverse);
            var t = e.program || e.inverse
              , n = e.program && e.inverse
              , r = n
              , i = n;
            if (n && n.chained) {
                r = n.body[0].program;
                while (i.chained)
                    i = i.body[i.body.length - 1].program
            }
            var s = {
                open: e.openStrip.open,
                close: e.closeStrip.close,
                openStandalone: a(t.body),
                closeStandalone: u((r || t).body)
            };
            e.openStrip.close && f(t.body, null, !0);
            if (n) {
                var o = e.inverseStrip;
                o.open && l(t.body, null, !0),
                o.close && f(r.body, null, !0),
                e.closeStrip.open && l(i.body, null, !0),
                u(t.body) && a(r.body) && (l(t.body),
                f(r.body))
            } else
                e.closeStrip.open && l(t.body, null, !0);
            return s
        }
        ,
        o.prototype.MustacheStatement = function(e) {
            return e.strip
        }
        ,
        o.prototype.PartialStatement = o.prototype.CommentStatement = function(e) {
            var t = e.strip || {};
            return {
                inlineStandalone: !0,
                open: t.open,
                close: t.close
            }
        }
        ,
        t["default"] = o,
        e.exports = t["default"]
    }
    , function(e, t, n) {
        "use strict";
        function o(e, t) {
            this.source = e,
            this.start = {
                line: t.first_line,
                column: t.first_column
            },
            this.end = {
                line: t.last_line,
                column: t.last_column
            }
        }
        function u(e) {
            return /^\[.*\]$/.test(e) ? e.substr(1, e.length - 2) : e
        }
        function a(e, t) {
            return {
                open: e.charAt(2) === "~",
                close: t.charAt(t.length - 3) === "~"
            }
        }
        function f(e) {
            return e.replace(/^\{\{~?\!-?-?/, "").replace(/-?-?~?\}\}$/, "")
        }
        function l(e, t, n) {
            n = this.locInfo(n);
            var r = e ? "@" : ""
              , i = []
              , o = 0
              , u = "";
            for (var a = 0, f = t.length; a < f; a++) {
                var l = t[a].part
                  , c = t[a].original !== l;
                r += (t[a].separator || "") + l;
                if (!!c || l !== ".." && l !== "." && l !== "this")
                    i.push(l);
                else {
                    if (i.length > 0)
                        throw new s["default"]("Invalid path: " + r,{
                            loc: n
                        });
                    l === ".." && (o++,
                    u += "../")
                }
            }
            return new this.PathExpression(e,o,i,r,n)
        }
        function c(e, t, n, r, i, s) {
            var o = r.charAt(3) || r.charAt(2)
              , u = o !== "{" && o !== "&";
            return new this.MustacheStatement(e,t,n,u,i,this.locInfo(s))
        }
        function h(e, t, n, r) {
            if (e.path.original !== n) {
                var i = {
                    loc: e.path.loc
                };
                throw new s["default"](e.path.original + " doesn't match " + n,i)
            }
            r = this.locInfo(r);
            var o = new this.Program([t],null,{},r);
            return new this.BlockStatement(e.path,e.params,e.hash,o,undefined,{},{},{},r)
        }
        function p(e, t, n, r, i, o) {
            if (r && r.path && e.path.original !== r.path.original) {
                var u = {
                    loc: e.path.loc
                };
                throw new s["default"](e.path.original + " doesn't match " + r.path.original,u)
            }
            t.blockParams = e.blockParams;
            var a = undefined
              , f = undefined;
            return n && (n.chain && (n.program.body[0].closeStrip = r.strip),
            f = n.strip,
            a = n.program),
            i && (i = a,
            a = t,
            t = i),
            new this.BlockStatement(e.path,e.params,e.hash,t,a,e.strip,f,r && r.strip,this.locInfo(o))
        }
        var r = n(8)["default"];
        t.__esModule = !0,
        t.SourceLocation = o,
        t.id = u,
        t.stripFlags = a,
        t.stripComment = f,
        t.preparePath = l,
        t.prepareMustache = c,
        t.prepareRawBlock = h,
        t.prepareBlock = p;
        var i = n(12)
          , s = r(i)
    }
    , function(e, t, n) {
        "use strict";
        function u(e, t, n) {
            if (r.isArray(e)) {
                var i = [];
                for (var s = 0, o = e.length; s < o; s++)
                    i.push(t.wrap(e[s], n));
                return i
            }
            return typeof e == "boolean" || typeof e == "number" ? e + "" : e
        }
        function a(e) {
            this.srcFile = e,
            this.source = []
        }
        t.__esModule = !0;
        var r = n(13)
          , i = undefined;
        try {} catch (o) {}
        i || (i = function(e, t, n, r) {
            this.src = "",
            r && this.add(r)
        }
        ,
        i.prototype = {
            add: function(t) {
                r.isArray(t) && (t = t.join("")),
                this.src += t
            },
            prepend: function(t) {
                r.isArray(t) && (t = t.join("")),
                this.src = t + this.src
            },
            toStringWithSourceMap: function() {
                return {
                    code: this.toString()
                }
            },
            toString: function f() {
                return this.src
            }
        }),
        a.prototype = {
            prepend: function(t, n) {
                this.source.unshift(this.wrap(t, n))
            },
            push: function(t, n) {
                this.source.push(this.wrap(t, n))
            },
            merge: function() {
                var t = this.empty();
                return this.each(function(e) {
                    t.add(["  ", e, "\n"])
                }),
                t
            },
            each: function(t) {
                for (var n = 0, r = this.source.length; n < r; n++)
                    t(this.source[n])
            },
            empty: function() {
                var t = arguments[0] === undefined ? this.currentLocation || {
                    start: {}
                } : arguments[0];
                return new i(t.start.line,t.start.column,this.srcFile)
            },
            wrap: function(t) {
                var n = arguments[1] === undefined ? this.currentLocation || {
                    start: {}
                } : arguments[1];
                return t instanceof i ? t : (t = u(t, this, n),
                new i(n.start.line,n.start.column,this.srcFile,t))
            },
            functionCall: function(t, n, r) {
                return r = this.generateList(r),
                this.wrap([t, n ? "." + n + "(" : "(", r, ")"])
            },
            quotedString: function(t) {
                return '"' + (t + "").replace(/\\/g, "\\\\").replace(/"/g, '\\"').replace(/\n/g, "\\n").replace(/\r/g, "\\r").replace(/\u2028/g, "\\u2028").replace(/\u2029/g, "\\u2029") + '"'
            },
            objectLiteral: function(t) {
                var n = [];
                for (var r in t)
                    if (t.hasOwnProperty(r)) {
                        var i = u(t[r], this);
                        i !== "undefined" && n.push([this.quotedString(r), ":", i])
                    }
                var s = this.generateList(n);
                return s.prepend("{"),
                s.add("}"),
                s
            },
            generateList: function(t, n) {
                var r = this.empty(n);
                for (var i = 0, s = t.length; i < s; i++)
                    i && r.add(","),
                    r.add(u(t[i], this, n));
                return r
            },
            generateArray: function(t, n) {
                var r = this.generateList(t, n);
                return r.prepend("["),
                r.add("]"),
                r
            }
        },
        t["default"] = a,
        e.exports = t["default"]
    }
    ])
});


Handlebars.registerHelper("ifCond", function(e, t, n, r) {
    switch (t) {
    case "!=":
        return e != n ? r.fn(this) : r.inverse(this);
    case "!==":
        return e !== n ? r.fn(this) : r.inverse(this);
    case "==":
        return e == n ? r.fn(this) : r.inverse(this);
    case "===":
        return e === n ? r.fn(this) : r.inverse(this);
    case "<":
        return e < n ? r.fn(this) : r.inverse(this);
    case "<=":
        return e <= n ? r.fn(this) : r.inverse(this);
    case ">":
        return e > n ? r.fn(this) : r.inverse(this);
    case ">=":
        return e >= n ? r.fn(this) : r.inverse(this);
    case "&&":
        return e && n ? r.fn(this) : r.inverse(this);
    case "||":
        return e || n ? r.fn(this) : r.inverse(this);
    default:
        return r.inverse(this)
    }
}),
Handlebars.registerHelper("listCount", function(e, t) {
    return parseInt(e) + 1
}),
Handlebars.registerHelper("subList", function(e, t, n, r) {
    var i = ""
      , s = t + n
      , o = 0;
    for (var u in e)
        if (u >= t && u < s) {
            var a = {};
            $.extend(a, e[u]),
            a.index = o,
            i += r.fn(a),
            o++
        }
    return i
}),
Handlebars.registerHelper("substr", function(e, t, n, r) {
    var i = "";
    return typeof n == "string" && (i = n || ""),
    typeof t != "string" ? "" : t.length > e ? t.substring(0, e) + i : t
}),
Handlebars.registerHelper("times", function(e, t) {
    var n = 0;
    for (var r = 0; r < e; ++r)
        n += t.fn(r);
    return n
}),
Handlebars.registerHelper("timesNoneString", function(e, t) {
    var n = "";
    for (var r = 0; r < e; ++r)
        n += t.fn(r);
    return n
}),
Handlebars.registerHelper("everyXtimes", function(e, t, n) {
    var r = parseInt(e);
    if (r > 0 && r % t === 0)
        return n.fn(this)
}),
Handlebars.registerHelper("toFixed", function(e, t) {
    var n = parseFloat(e);
    return isNaN(n) ? e : n.toFixed(t)
}),
Handlebars.registerHelper("x", function(expression, options) {
    var result, context = this;
    with (context)
        result = function() {
            try {
                return eval(expression)
            } catch (e) {
                console.warn("•Expression: {{x '" + expression + "'}}\n•JS-Error: ", e, "\n•Context: ", context)
            }
        }
        .call(context);
    return result
}),
Handlebars.registerHelper("xif", function(e, t) {
    return Handlebars.helpers.x.apply(this, [e, t]) ? t.fn(this) : t.inverse(this)
}),
Handlebars.registerHelper("statsValidChecker", function(e, t) {
    return t = _.isObject(t) ? "-" : t,
    e || e === 0 ? e : t
}),
Handlebars.registerHelper("reverse", function(e) {
    e.reverse()
}),
Handlebars.registerHelper("math", function(e, t, n, r) {
    return e = parseFloat(e),
    n = parseFloat(n),
    {
        "+": e + n,
        "-": e - n,
        "*": e * n,
        "/": e / n,
        "%": e % n
    }[t]
}),
Handlebars.registerHelper("debug", function(e, t) {
    console.log(e);
    if (t === !0)
        debugger ;return ""
}),
Handlebars.registerHelper("cutString", function(e, t) {
    var n = t > 0 && e.length > t ? e.substring(0, t) + "..." : e;
    return n
});
var _handlebarsHelperSum = function(e, t) {
    var n = e;
    for (var r in t)
        typeof t[r] != "object" && (n += t[r]);
    return n
};
Handlebars.registerHelper("concat", function() {
    return _handlebarsHelperSum("", arguments)
}),
Handlebars.registerHelper("sum", function() {
    return _handlebarsHelperSum(0, arguments)
}),
Handlebars.registerHelper("minus", function() {
    return arguments[0] - arguments[1]
}),
Handlebars.registerHelper("encodeURI", function(e) {
    return "string" == typeof e || e instanceof String ? encodeURIComponent(e) : ""
}),
Handlebars.registerHelper("unescape", function(e) {
    return "string" == typeof e || e instanceof String ? unescape(e) : ""
}),
Handlebars.registerHelper("dthumbMaker", function(e, t) {
    return "https://dthumb-phinf.pstatic.net/?src=" + e + "&type=" + t + "&service=sports"
}),
Handlebars.registerHelper("imageCategorySelector", function(e) {
    return imageCategoryMappingObject.hasOwnProperty(e) ? imageCategoryMappingObject[e] : e
}),
Handlebars.registerHelper("replace", function(e, t, n) {
    return n.replace(e, t)
}),
Handlebars.registerHelper("ifOdd", function(e, t) {
    return e % 2 === 1 ? t.fn(this) : t.inverse(this)
});
!function() {
    var e = "object" == typeof self && self.self === self && self || "object" == typeof global && global.global === global && global || this || {}
      , t = e._
      , n = Array.prototype
      , r = Object.prototype
      , i = "undefined" != typeof Symbol ? Symbol.prototype : null
      , s = n.push
      , o = n.slice
      , u = r.toString
      , a = r.hasOwnProperty
      , f = Array.isArray
      , l = Object.keys
      , c = Object.create
      , h = function() {}
      , p = function(e) {
        return e instanceof p ? e : this instanceof p ? void (this._wrapped = e) : new p(e)
    };
    "undefined" == typeof exports || exports.nodeType ? e._ = p : ("undefined" != typeof module && !module.nodeType && module.exports && (exports = module.exports = p),
    exports._ = p),
    p.VERSION = "1.9.1";
    var d, v = function(e, t, n) {
        if (void 0 === t)
            return e;
        switch (null == n ? 3 : n) {
        case 1:
            return function(n) {
                return e.call(t, n)
            }
            ;
        case 3:
            return function(n, r, i) {
                return e.call(t, n, r, i)
            }
            ;
        case 4:
            return function(n, r, i, s) {
                return e.call(t, n, r, i, s)
            }
        }
        return function() {
            return e.apply(t, arguments)
        }
    }, m = function(e, t, n) {
        return p.iteratee !== d ? p.iteratee(e, t) : null == e ? p.identity : p.isFunction(e) ? v(e, t, n) : p.isObject(e) && !p.isArray(e) ? p.matcher(e) : p.property(e)
    };
    p.iteratee = d = function(e, t) {
        return m(e, t, 1 / 0)
    }
    ;
    var g = function(e, t) {
        return t = null == t ? e.length - 1 : +t,
        function() {
            for (var n = Math.max(arguments.length - t, 0), r = Array(n), i = 0; i < n; i++)
                r[i] = arguments[i + t];
            switch (t) {
            case 0:
                return e.call(this, r);
            case 1:
                return e.call(this, arguments[0], r);
            case 2:
                return e.call(this, arguments[0], arguments[1], r)
            }
            var s = Array(t + 1);
            for (i = 0; i < t; i++)
                s[i] = arguments[i];
            return s[t] = r,
            e.apply(this, s)
        }
    }
      , y = function(e) {
        if (!p.isObject(e))
            return {};
        if (c)
            return c(e);
        h.prototype = e;
        var t = new h;
        return h.prototype = null,
        t
    }
      , b = function(e) {
        return function(t) {
            return null == t ? void 0 : t[e]
        }
    }
      , w = function(e, t) {
        return null != e && a.call(e, t)
    }
      , E = function(e, t) {
        for (var n = t.length, r = 0; r < n; r++) {
            if (null == e)
                return;
            e = e[t[r]]
        }
        return n ? e : void 0
    }
      , S = Math.pow(2, 53) - 1
      , x = b("length")
      , T = function(e) {
        var t = x(e);
        return "number" == typeof t && 0 <= t && t <= S
    };
    p.each = p.forEach = function(e, t, n) {
        var r, i;
        if (t = v(t, n),
        T(e))
            for (r = 0,
            i = e.length; r < i; r++)
                t(e[r], r, e);
        else {
            var s = p.keys(e);
            for (r = 0,
            i = s.length; r < i; r++)
                t(e[s[r]], s[r], e)
        }
        return e
    }
    ,
    p.map = p.collect = function(e, t, n) {
        t = m(t, n);
        for (var r = !T(e) && p.keys(e), i = (r || e).length, s = Array(i), o = 0; o < i; o++) {
            var u = r ? r[o] : o;
            s[o] = t(e[u], u, e)
        }
        return s
    }
    ;
    var N = function(e) {
        return function(t, n, r, i) {
            var s = 3 <= arguments.length;
            return function(t, n, r, i) {
                var s = !T(t) && p.keys(t)
                  , o = (s || t).length
                  , u = 0 < e ? 0 : o - 1;
                for (i || (r = t[s ? s[u] : u],
                u += e); 0 <= u && u < o; u += e) {
                    var a = s ? s[u] : u;
                    r = n(r, t[a], a, t)
                }
                return r
            }(t, v(n, i, 4), r, s)
        }
    };
    p.reduce = p.foldl = p.inject = N(1),
    p.reduceRight = p.foldr = N(-1),
    p.find = p.detect = function(e, t, n) {
        var r = (T(e) ? p.findIndex : p.findKey)(e, t, n);
        if (void 0 !== r && -1 !== r)
            return e[r]
    }
    ,
    p.filter = p.select = function(e, t, n) {
        var r = [];
        return t = m(t, n),
        p.each(e, function(e, n, i) {
            t(e, n, i) && r.push(e)
        }),
        r
    }
    ,
    p.reject = function(e, t, n) {
        return p.filter(e, p.negate(m(t)), n)
    }
    ,
    p.every = p.all = function(e, t, n) {
        t = m(t, n);
        for (var r = !T(e) && p.keys(e), i = (r || e).length, s = 0; s < i; s++) {
            var o = r ? r[s] : s;
            if (!t(e[o], o, e))
                return !1
        }
        return !0
    }
    ,
    p.some = p.any = function(e, t, n) {
        t = m(t, n);
        for (var r = !T(e) && p.keys(e), i = (r || e).length, s = 0; s < i; s++) {
            var o = r ? r[s] : s;
            if (t(e[o], o, e))
                return !0
        }
        return !1
    }
    ,
    p.contains = p.includes = p.include = function(e, t, n, r) {
        return T(e) || (e = p.values(e)),
        ("number" != typeof n || r) && (n = 0),
        0 <= p.indexOf(e, t, n)
    }
    ,
    p.invoke = g(function(e, t, n) {
        var r, i;
        return p.isFunction(t) ? i = t : p.isArray(t) && (r = t.slice(0, -1),
        t = t[t.length - 1]),
        p.map(e, function(e) {
            var s = i;
            if (!s) {
                if (r && r.length && (e = E(e, r)),
                null == e)
                    return;
                s = e[t]
            }
            return null == s ? s : s.apply(e, n)
        })
    }),
    p.pluck = function(e, t) {
        return p.map(e, p.property(t))
    }
    ,
    p.where = function(e, t) {
        return p.filter(e, p.matcher(t))
    }
    ,
    p.findWhere = function(e, t) {
        return p.find(e, p.matcher(t))
    }
    ,
    p.max = function(e, t, n) {
        var r, i, s = -1 / 0, o = -1 / 0;
        if (null == t || "number" == typeof t && "object" != typeof e[0] && null != e)
            for (var u = 0, a = (e = T(e) ? e : p.values(e)).length; u < a; u++)
                null != (r = e[u]) && s < r && (s = r);
        else
            t = m(t, n),
            p.each(e, function(e, n, r) {
                i = t(e, n, r),
                (o < i || i === -1 / 0 && s === -1 / 0) && (s = e,
                o = i)
            });
        return s
    }
    ,
    p.min = function(e, t, n) {
        var r, i, s = 1 / 0, o = 1 / 0;
        if (null == t || "number" == typeof t && "object" != typeof e[0] && null != e)
            for (var u = 0, a = (e = T(e) ? e : p.values(e)).length; u < a; u++)
                null != (r = e[u]) && r < s && (s = r);
        else
            t = m(t, n),
            p.each(e, function(e, n, r) {
                ((i = t(e, n, r)) < o || i === 1 / 0 && s === 1 / 0) && (s = e,
                o = i)
            });
        return s
    }
    ,
    p.shuffle = function(e) {
        return p.sample(e, 1 / 0)
    }
    ,
    p.sample = function(e, t, n) {
        if (null == t || n)
            return T(e) || (e = p.values(e)),
            e[p.random(e.length - 1)];
        var r = T(e) ? p.clone(e) : p.values(e)
          , i = x(r);
        t = Math.max(Math.min(t, i), 0);
        for (var s = i - 1, o = 0; o < t; o++) {
            var u = p.random(o, s)
              , a = r[o];
            r[o] = r[u],
            r[u] = a
        }
        return r.slice(0, t)
    }
    ,
    p.sortBy = function(e, t, n) {
        var r = 0;
        return t = m(t, n),
        p.pluck(p.map(e, function(e, n, i) {
            return {
                value: e,
                index: r++,
                criteria: t(e, n, i)
            }
        }).sort(function(e, t) {
            var n = e.criteria
              , r = t.criteria;
            if (n !== r) {
                if (r < n || void 0 === n)
                    return 1;
                if (n < r || void 0 === r)
                    return -1
            }
            return e.index - t.index
        }), "value")
    }
    ;
    var C = function(e, t) {
        return function(n, r, i) {
            var s = t ? [[], []] : {};
            return r = m(r, i),
            p.each(n, function(t, i) {
                var o = r(t, i, n);
                e(s, t, o)
            }),
            s
        }
    };
    p.groupBy = C(function(e, t, n) {
        w(e, n) ? e[n].push(t) : e[n] = [t]
    }),
    p.indexBy = C(function(e, t, n) {
        e[n] = t
    }),
    p.countBy = C(function(e, t, n) {
        w(e, n) ? e[n]++ : e[n] = 1
    });
    var k = /[^\ud800-\udfff]|[\ud800-\udbff][\udc00-\udfff]|[\ud800-\udfff]/g;
    p.toArray = function(e) {
        return e ? p.isArray(e) ? o.call(e) : p.isString(e) ? e.match(k) : T(e) ? p.map(e, p.identity) : p.values(e) : []
    }
    ,
    p.size = function(e) {
        return null == e ? 0 : T(e) ? e.length : p.keys(e).length
    }
    ,
    p.partition = C(function(e, t, n) {
        e[n ? 0 : 1].push(t)
    }, !0),
    p.first = p.head = p.take = function(e, t, n) {
        return null == e || e.length < 1 ? null == t ? void 0 : [] : null == t || n ? e[0] : p.initial(e, e.length - t)
    }
    ,
    p.initial = function(e, t, n) {
        return o.call(e, 0, Math.max(0, e.length - (null == t || n ? 1 : t)))
    }
    ,
    p.last = function(e, t, n) {
        return null == e || e.length < 1 ? null == t ? void 0 : [] : null == t || n ? e[e.length - 1] : p.rest(e, Math.max(0, e.length - t))
    }
    ,
    p.rest = p.tail = p.drop = function(e, t, n) {
        return o.call(e, null == t || n ? 1 : t)
    }
    ,
    p.compact = function(e) {
        return p.filter(e, Boolean)
    }
    ;
    var L = function(e, t, n, r) {
        for (var i = (r = r || []).length, s = 0, o = x(e); s < o; s++) {
            var u = e[s];
            if (T(u) && (p.isArray(u) || p.isArguments(u)))
                if (t)
                    for (var a = 0, f = u.length; a < f; )
                        r[i++] = u[a++];
                else
                    L(u, t, n, r),
                    i = r.length;
            else
                n || (r[i++] = u)
        }
        return r
    };
    p.flatten = function(e, t) {
        return L(e, t, !1)
    }
    ,
    p.without = g(function(e, t) {
        return p.difference(e, t)
    }),
    p.uniq = p.unique = function(e, t, n, r) {
        p.isBoolean(t) || (r = n,
        n = t,
        t = !1),
        null != n && (n = m(n, r));
        for (var i = [], s = [], o = 0, u = x(e); o < u; o++) {
            var a = e[o]
              , f = n ? n(a, o, e) : a;
            t && !n ? (o && s === f || i.push(a),
            s = f) : n ? p.contains(s, f) || (s.push(f),
            i.push(a)) : p.contains(i, a) || i.push(a)
        }
        return i
    }
    ,
    p.union = g(function(e) {
        return p.uniq(L(e, !0, !0))
    }),
    p.intersection = function(e) {
        for (var t = [], n = arguments.length, r = 0, i = x(e); r < i; r++) {
            var s = e[r];
            if (!p.contains(t, s)) {
                var o;
                for (o = 1; o < n && p.contains(arguments[o], s); o++)
                    ;
                o === n && t.push(s)
            }
        }
        return t
    }
    ,
    p.difference = g(function(e, t) {
        return t = L(t, !0, !0),
        p.filter(e, function(e) {
            return !p.contains(t, e)
        })
    }),
    p.unzip = function(e) {
        for (var t = e && p.max(e, x).length || 0, n = Array(t), r = 0; r < t; r++)
            n[r] = p.pluck(e, r);
        return n
    }
    ,
    p.zip = g(p.unzip),
    p.object = function(e, t) {
        for (var n = {}, r = 0, i = x(e); r < i; r++)
            t ? n[e[r]] = t[r] : n[e[r][0]] = e[r][1];
        return n
    }
    ;
    var A = function(e) {
        return function(t, n, r) {
            n = m(n, r);
            for (var i = x(t), s = 0 < e ? 0 : i - 1; 0 <= s && s < i; s += e)
                if (n(t[s], s, t))
                    return s;
            return -1
        }
    };
    p.findIndex = A(1),
    p.findLastIndex = A(-1),
    p.sortedIndex = function(e, t, n, r) {
        for (var i = (n = m(n, r, 1))(t), s = 0, o = x(e); s < o; ) {
            var u = Math.floor((s + o) / 2);
            n(e[u]) < i ? s = u + 1 : o = u
        }
        return s
    }
    ;
    var O = function(e, t, n) {
        return function(r, i, s) {
            var u = 0
              , a = x(r);
            if ("number" == typeof s)
                0 < e ? u = 0 <= s ? s : Math.max(s + a, u) : a = 0 <= s ? Math.min(s + 1, a) : s + a + 1;
            else if (n && s && a)
                return r[s = n(r, i)] === i ? s : -1;
            if (i != i)
                return 0 <= (s = t(o.call(r, u, a), p.isNaN)) ? s + u : -1;
            for (s = 0 < e ? u : a - 1; 0 <= s && s < a; s += e)
                if (r[s] === i)
                    return s;
            return -1
        }
    };
    p.indexOf = O(1, p.findIndex, p.sortedIndex),
    p.lastIndexOf = O(-1, p.findLastIndex),
    p.range = function(e, t, n) {
        null == t && (t = e || 0,
        e = 0),
        n || (n = t < e ? -1 : 1);
        for (var r = Math.max(Math.ceil((t - e) / n), 0), i = Array(r), s = 0; s < r; s++,
        e += n)
            i[s] = e;
        return i
    }
    ,
    p.chunk = function(e, t) {
        if (null == t || t < 1)
            return [];
        for (var n = [], r = 0, i = e.length; r < i; )
            n.push(o.call(e, r, r += t));
        return n
    }
    ;
    var M = function(e, t, n, r, i) {
        if (r instanceof t) {
            var s = y(e.prototype)
              , o = e.apply(s, i);
            return p.isObject(o) ? o : s
        }
        return e.apply(n, i)
    };
    p.bind = g(function(e, t, n) {
        if (!p.isFunction(e))
            throw new TypeError("Bind must be called on a function");
        var r = g(function(i) {
            return M(e, r, t, this, n.concat(i))
        });
        return r
    }),
    p.partial = g(function(e, t) {
        var n = p.partial.placeholder
          , r = function() {
            for (var i = 0, s = t.length, o = Array(s), u = 0; u < s; u++)
                o[u] = t[u] === n ? arguments[i++] : t[u];
            for (; i < arguments.length; )
                o.push(arguments[i++]);
            return M(e, r, this, this, o)
        };
        return r
    }),
    (p.partial.placeholder = p).bindAll = g(function(e, t) {
        var n = (t = L(t, !1, !1)).length;
        if (n < 1)
            throw new Error("bindAll must be passed function names");
        for (; n--; ) {
            var r = t[n];
            e[r] = p.bind(e[r], e)
        }
    }),
    p.memoize = function(e, t) {
        var n = function(r) {
            var i = n.cache
              , s = "" + (t ? t.apply(this, arguments) : r);
            return w(i, s) || (i[s] = e.apply(this, arguments)),
            i[s]
        };
        return n.cache = {},
        n
    }
    ,
    p.delay = g(function(e, t, n) {
        return setTimeout(function() {
            return e.apply(null, n)
        }, t)
    }),
    p.defer = p.partial(p.delay, p, 1),
    p.throttle = function(e, t, n) {
        var r, i, s, o, u = 0;
        n || (n = {});
        var a = function() {
            u = !1 === n.leading ? 0 : p.now(),
            r = null,
            o = e.apply(i, s),
            r || (i = s = null)
        }
          , f = function() {
            var f = p.now();
            u || !1 !== n.leading || (u = f);
            var l = t - (f - u);
            return i = this,
            s = arguments,
            l <= 0 || t < l ? (r && (clearTimeout(r),
            r = null),
            u = f,
            o = e.apply(i, s),
            r || (i = s = null)) : r || !1 === n.trailing || (r = setTimeout(a, l)),
            o
        };
        return f.cancel = function() {
            clearTimeout(r),
            u = 0,
            r = i = s = null
        }
        ,
        f
    }
    ,
    p.debounce = function(e, t, n) {
        var r, i, s = function(t, n) {
            r = null,
            n && (i = e.apply(t, n))
        }, o = g(function(o) {
            if (r && clearTimeout(r),
            n) {
                var u = !r;
                r = setTimeout(s, t),
                u && (i = e.apply(this, o))
            } else
                r = p.delay(s, t, this, o);
            return i
        });
        return o.cancel = function() {
            clearTimeout(r),
            r = null
        }
        ,
        o
    }
    ,
    p.wrap = function(e, t) {
        return p.partial(t, e)
    }
    ,
    p.negate = function(e) {
        return function() {
            return !e.apply(this, arguments)
        }
    }
    ,
    p.compose = function() {
        var e = arguments
          , t = e.length - 1;
        return function() {
            for (var n = t, r = e[t].apply(this, arguments); n--; )
                r = e[n].call(this, r);
            return r
        }
    }
    ,
    p.after = function(e, t) {
        return function() {
            if (--e < 1)
                return t.apply(this, arguments)
        }
    }
    ,
    p.before = function(e, t) {
        var n;
        return function() {
            return 0 < --e && (n = t.apply(this, arguments)),
            e <= 1 && (t = null),
            n
        }
    }
    ,
    p.once = p.partial(p.before, 2),
    p.restArguments = g;
    var _ = !{
        toString: null
    }.propertyIsEnumerable("toString")
      , D = ["valueOf", "isPrototypeOf", "toString", "propertyIsEnumerable", "hasOwnProperty", "toLocaleString"]
      , P = function(e, t) {
        var n = D.length
          , i = e.constructor
          , s = p.isFunction(i) && i.prototype || r
          , o = "constructor";
        for (w(e, o) && !p.contains(t, o) && t.push(o); n--; )
            (o = D[n])in e && e[o] !== s[o] && !p.contains(t, o) && t.push(o)
    };
    p.keys = function(e) {
        if (!p.isObject(e))
            return [];
        if (l)
            return l(e);
        var t = [];
        for (var n in e)
            w(e, n) && t.push(n);
        return _ && P(e, t),
        t
    }
    ,
    p.allKeys = function(e) {
        if (!p.isObject(e))
            return [];
        var t = [];
        for (var n in e)
            t.push(n);
        return _ && P(e, t),
        t
    }
    ,
    p.values = function(e) {
        for (var t = p.keys(e), n = t.length, r = Array(n), i = 0; i < n; i++)
            r[i] = e[t[i]];
        return r
    }
    ,
    p.mapObject = function(e, t, n) {
        t = m(t, n);
        for (var r = p.keys(e), i = r.length, s = {}, o = 0; o < i; o++) {
            var u = r[o];
            s[u] = t(e[u], u, e)
        }
        return s
    }
    ,
    p.pairs = function(e) {
        for (var t = p.keys(e), n = t.length, r = Array(n), i = 0; i < n; i++)
            r[i] = [t[i], e[t[i]]];
        return r
    }
    ,
    p.invert = function(e) {
        for (var t = {}, n = p.keys(e), r = 0, i = n.length; r < i; r++)
            t[e[n[r]]] = n[r];
        return t
    }
    ,
    p.functions = p.methods = function(e) {
        var t = [];
        for (var n in e)
            p.isFunction(e[n]) && t.push(n);
        return t.sort()
    }
    ;
    var H = function(e, t) {
        return function(n) {
            var r = arguments.length;
            if (t && (n = Object(n)),
            r < 2 || null == n)
                return n;
            for (var i = 1; i < r; i++)
                for (var s = arguments[i], o = e(s), u = o.length, a = 0; a < u; a++) {
                    var f = o[a];
                    t && void 0 !== n[f] || (n[f] = s[f])
                }
            return n
        }
    };
    p.extend = H(p.allKeys),
    p.extendOwn = p.assign = H(p.keys),
    p.findKey = function(e, t, n) {
        t = m(t, n);
        for (var r, i = p.keys(e), s = 0, o = i.length; s < o; s++)
            if (t(e[r = i[s]], r, e))
                return r
    }
    ;
    var B, j, F = function(e, t, n) {
        return t in n
    };
    p.pick = g(function(e, t) {
        var n = {}
          , r = t[0];
        if (null == e)
            return n;
        p.isFunction(r) ? (1 < t.length && (r = v(r, t[1])),
        t = p.allKeys(e)) : (r = F,
        t = L(t, !1, !1),
        e = Object(e));
        for (var i = 0, s = t.length; i < s; i++) {
            var o = t[i]
              , u = e[o];
            r(u, o, e) && (n[o] = u)
        }
        return n
    }),
    p.omit = g(function(e, t) {
        var n, r = t[0];
        return p.isFunction(r) ? (r = p.negate(r),
        1 < t.length && (n = t[1])) : (t = p.map(L(t, !1, !1), String),
        r = function(e, n) {
            return !p.contains(t, n)
        }
        ),
        p.pick(e, r, n)
    }),
    p.defaults = H(p.allKeys, !0),
    p.create = function(e, t) {
        var n = y(e);
        return t && p.extendOwn(n, t),
        n
    }
    ,
    p.clone = function(e) {
        return p.isObject(e) ? p.isArray(e) ? e.slice() : p.extend({}, e) : e
    }
    ,
    p.tap = function(e, t) {
        return t(e),
        e
    }
    ,
    p.isMatch = function(e, t) {
        var n = p.keys(t)
          , r = n.length;
        if (null == e)
            return !r;
        for (var i = Object(e), s = 0; s < r; s++) {
            var o = n[s];
            if (t[o] !== i[o] || !(o in i))
                return !1
        }
        return !0
    }
    ,
    B = function(e, t, n, r) {
        if (e === t)
            return 0 !== e || 1 / e == 1 / t;
        if (null == e || null == t)
            return !1;
        if (e != e)
            return t != t;
        var i = typeof e;
        return ("function" === i || "object" === i || "object" == typeof t) && j(e, t, n, r)
    }
    ,
    j = function(e, t, n, r) {
        e instanceof p && (e = e._wrapped),
        t instanceof p && (t = t._wrapped);
        var s = u.call(e);
        if (s !== u.call(t))
            return !1;
        switch (s) {
        case "[object RegExp]":
        case "[object String]":
            return "" + e == "" + t;
        case "[object Number]":
            return +e != +e ? +t != +t : 0 == +e ? 1 / +e == 1 / t : +e == +t;
        case "[object Date]":
        case "[object Boolean]":
            return +e == +t;
        case "[object Symbol]":
            return i.valueOf.call(e) === i.valueOf.call(t)
        }
        var o = "[object Array]" === s;
        if (!o) {
            if ("object" != typeof e || "object" != typeof t)
                return !1;
            var a = e.constructor
              , f = t.constructor;
            if (a !== f && !(p.isFunction(a) && a instanceof a && p.isFunction(f) && f instanceof f) && "constructor"in e && "constructor"in t)
                return !1
        }
        r = r || [];
        for (var l = (n = n || []).length; l--; )
            if (n[l] === e)
                return r[l] === t;
        if (n.push(e),
        r.push(t),
        o) {
            if ((l = e.length) !== t.length)
                return !1;
            for (; l--; )
                if (!B(e[l], t[l], n, r))
                    return !1
        } else {
            var c, h = p.keys(e);
            if (l = h.length,
            p.keys(t).length !== l)
                return !1;
            for (; l--; )
                if (c = h[l],
                !w(t, c) || !B(e[c], t[c], n, r))
                    return !1
        }
        return n.pop(),
        r.pop(),
        !0
    }
    ,
    p.isEqual = function(e, t) {
        return B(e, t)
    }
    ,
    p.isEmpty = function(e) {
        return null == e || (T(e) && (p.isArray(e) || p.isString(e) || p.isArguments(e)) ? 0 === e.length : 0 === p.keys(e).length)
    }
    ,
    p.isElement = function(e) {
        return !!e && 1 === e.nodeType
    }
    ,
    p.isArray = f || function(e) {
        return "[object Array]" === u.call(e)
    }
    ,
    p.isObject = function(e) {
        var t = typeof e;
        return "function" === t || "object" === t && !!e
    }
    ,
    p.each(["Arguments", "Function", "String", "Number", "Date", "RegExp", "Error", "Symbol", "Map", "WeakMap", "Set", "WeakSet"], function(e) {
        p["is" + e] = function(t) {
            return u.call(t) === "[object " + e + "]"
        }
    }),
    p.isArguments(arguments) || (p.isArguments = function(e) {
        return w(e, "callee")
    }
    );
    var I = e.document && e.document.childNodes;
    "function" != typeof /./ && "object" != typeof Int8Array && "function" != typeof I && (p.isFunction = function(e) {
        return "function" == typeof e || !1
    }
    ),
    p.isFinite = function(e) {
        return !p.isSymbol(e) && isFinite(e) && !isNaN(parseFloat(e))
    }
    ,
    p.isNaN = function(e) {
        return p.isNumber(e) && isNaN(e)
    }
    ,
    p.isBoolean = function(e) {
        return !0 === e || !1 === e || "[object Boolean]" === u.call(e)
    }
    ,
    p.isNull = function(e) {
        return null === e
    }
    ,
    p.isUndefined = function(e) {
        return void 0 === e
    }
    ,
    p.has = function(e, t) {
        if (!p.isArray(t))
            return w(e, t);
        for (var n = t.length, r = 0; r < n; r++) {
            var i = t[r];
            if (null == e || !a.call(e, i))
                return !1;
            e = e[i]
        }
        return !!n
    }
    ,
    p.noConflict = function() {
        return e._ = t,
        this
    }
    ,
    p.identity = function(e) {
        return e
    }
    ,
    p.constant = function(e) {
        return function() {
            return e
        }
    }
    ,
    p.noop = function() {}
    ,
    p.property = function(e) {
        return p.isArray(e) ? function(t) {
            return E(t, e)
        }
        : b(e)
    }
    ,
    p.propertyOf = function(e) {
        return null == e ? function() {}
        : function(t) {
            return p.isArray(t) ? E(e, t) : e[t]
        }
    }
    ,
    p.matcher = p.matches = function(e) {
        return e = p.extendOwn({}, e),
        function(t) {
            return p.isMatch(t, e)
        }
    }
    ,
    p.times = function(e, t, n) {
        var r = Array(Math.max(0, e));
        t = v(t, n, 1);
        for (var i = 0; i < e; i++)
            r[i] = t(i);
        return r
    }
    ,
    p.random = function(e, t) {
        return null == t && (t = e,
        e = 0),
        e + Math.floor(Math.random() * (t - e + 1))
    }
    ,
    p.now = Date.now || function() {
        return (new Date).getTime()
    }
    ;
    var q = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#x27;",
        "`": "&#x60;"
    }
      , R = p.invert(q)
      , U = function(e) {
        var t = function(t) {
            return e[t]
        }
          , n = "(?:" + p.keys(e).join("|") + ")"
          , r = RegExp(n)
          , i = RegExp(n, "g");
        return function(e) {
            return e = null == e ? "" : "" + e,
            r.test(e) ? e.replace(i, t) : e
        }
    };
    p.escape = U(q),
    p.unescape = U(R),
    p.result = function(e, t, n) {
        p.isArray(t) || (t = [t]);
        var r = t.length;
        if (!r)
            return p.isFunction(n) ? n.call(e) : n;
        for (var i = 0; i < r; i++) {
            var s = null == e ? void 0 : e[t[i]];
            void 0 === s && (s = n,
            i = r),
            e = p.isFunction(s) ? s.call(e) : s
        }
        return e
    }
    ;
    var z = 0;
    p.uniqueId = function(e) {
        var t = ++z + "";
        return e ? e + t : t
    }
    ,
    p.templateSettings = {
        evaluate: /<%([\s\S]+?)%>/g,
        interpolate: /<%=([\s\S]+?)%>/g,
        escape: /<%-([\s\S]+?)%>/g
    };
    var W = /(.)^/
      , X = {
        "'": "'",
        "\\": "\\",
        "\r": "r",
        "\n": "n",
        "\u2028": "u2028",
        "\u2029": "u2029"
    }
      , V = /\\|'|\r|\n|\u2028|\u2029/g
      , $ = function(e) {
        return "\\" + X[e]
    };
    p.template = function(e, t, n) {
        !t && n && (t = n),
        t = p.defaults({}, t, p.templateSettings);
        var r, i = RegExp([(t.escape || W).source, (t.interpolate || W).source, (t.evaluate || W).source].join("|") + "|$", "g"), s = 0, o = "__p+='";
        e.replace(i, function(t, n, r, i, u) {
            return o += e.slice(s, u).replace(V, $),
            s = u + t.length,
            n ? o += "'+\n((__t=(" + n + "))==null?'':_.escape(__t))+\n'" : r ? o += "'+\n((__t=(" + r + "))==null?'':__t)+\n'" : i && (o += "';\n" + i + "\n__p+='"),
            t
        }),
        o += "';\n",
        t.variable || (o = "with(obj||{}){\n" + o + "}\n"),
        o = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + o + "return __p;\n";
        try {
            r = new Function(t.variable || "obj","_",o)
        } catch (t) {
            throw t.source = o,
            t
        }
        var u = function(e) {
            return r.call(this, e, p)
        }
          , a = t.variable || "obj";
        return u.source = "function(" + a + "){\n" + o + "}",
        u
    }
    ,
    p.chain = function(e) {
        var t = p(e);
        return t._chain = !0,
        t
    }
    ;
    var J = function(e, t) {
        return e._chain ? p(t).chain() : t
    };
    p.mixin = function(e) {
        return p.each(p.functions(e), function(t) {
            var n = p[t] = e[t];
            p.prototype[t] = function() {
                var e = [this._wrapped];
                return s.apply(e, arguments),
                J(this, n.apply(p, e))
            }
        }),
        p
    }
    ,
    p.mixin(p),
    p.each(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function(e) {
        var t = n[e];
        p.prototype[e] = function() {
            var n = this._wrapped;
            return t.apply(n, arguments),
            "shift" !== e && "splice" !== e || 0 !== n.length || delete n[0],
            J(this, n)
        }
    }),
    p.each(["concat", "join", "slice"], function(e) {
        var t = n[e];
        p.prototype[e] = function() {
            return J(this, t.apply(this._wrapped, arguments))
        }
    }),
    p.prototype.value = function() {
        return this._wrapped
    }
    ,
    p.prototype.valueOf = p.prototype.toJSON = p.prototype.value,
    p.prototype.toString = function() {
        return String(this._wrapped)
    }
    ,
    "function" == typeof define && define.amd && define("underscore", [], function() {
        return p
    })
}();
(function(e) {
    if (typeof exports == "object" && typeof module != "undefined")
        module.exports = e();
    else if (typeof define == "function" && define.amd)
        define([], e);
    else {
        var t;
        typeof window != "undefined" ? t = window : typeof global != "undefined" ? t = global : typeof self != "undefined" ? t = self : t = this,
        t.s = e()
    }
}
)(function() {
    var e, t, n;
    return function r(e, t, n) {
        function i(o, u) {
            if (!t[o]) {
                if (!e[o]) {
                    var a = typeof require == "function" && require;
                    if (!u && a)
                        return a(o, !0);
                    if (s)
                        return s(o, !0);
                    var f = new Error("Cannot find module '" + o + "'");
                    throw f.code = "MODULE_NOT_FOUND",
                    f
                }
                var l = t[o] = {
                    exports: {}
                };
                e[o][0].call(l.exports, function(t) {
                    var n = e[o][1][t];
                    return i(n ? n : t)
                }, l, l.exports, r, e, t, n)
            }
            return t[o].exports
        }
        var s = typeof require == "function" && require;
        for (var o = 0; o < n.length; o++)
            i(n[o]);
        return i
    }({
        1: [function(e, t, n) {
            var r = e("./trim")
              , i = e("./decapitalize");
            t.exports = function(t, n) {
                return t = r(t).replace(/[-_\s]+(.)?/g, function(e, t) {
                    return t ? t.toUpperCase() : ""
                }),
                n === !0 ? i(t) : t
            }
        }
        , {
            "./decapitalize": 10,
            "./trim": 65
        }],
        2: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                t = r(t);
                var i = n ? t.slice(1).toLowerCase() : t.slice(1);
                return t.charAt(0).toUpperCase() + i
            }
        }
        , {
            "./helper/makeString": 20
        }],
        3: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t) {
                return r(t).split("")
            }
        }
        , {
            "./helper/makeString": 20
        }],
        4: [function(e, t, n) {
            t.exports = function(t, n) {
                return t == null ? [] : (t = String(t),
                n = ~~n,
                n > 0 ? t.match(new RegExp(".{1," + n + "}","g")) : [t])
            }
        }
        , {}],
        5: [function(e, t, n) {
            var r = e("./capitalize")
              , i = e("./camelize")
              , s = e("./helper/makeString");
            t.exports = function(t) {
                return t = s(t),
                r(i(t.replace(/[\W_]/g, " ")).replace(/\s/g, ""))
            }
        }
        , {
            "./camelize": 1,
            "./capitalize": 2,
            "./helper/makeString": 20
        }],
        6: [function(e, t, n) {
            var r = e("./trim");
            t.exports = function(t) {
                return r(t).replace(/\s\s+/g, " ")
            }
        }
        , {
            "./trim": 65
        }],
        7: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = "ąàáäâãåæăćčĉęèéëêĝĥìíïîĵłľńňòóöőôõðøśșşšŝťțţŭùúüűûñÿýçżźž"
              , s = "aaaaaaaaaccceeeeeghiiiijllnnoooooooossssstttuuuuuunyyczzz";
            i += i.toUpperCase(),
            s += s.toUpperCase(),
            s = s.split(""),
            i += "ß",
            s.push("ss"),
            t.exports = function(t) {
                return r(t).replace(/.{1}/g, function(e) {
                    var t = i.indexOf(e);
                    return t === -1 ? e : s[t]
                })
            }
        }
        , {
            "./helper/makeString": 20
        }],
        8: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(e, t) {
                return e = r(e),
                t = r(t),
                e.length === 0 || t.length === 0 ? 0 : e.split(t).length - 1
            }
        }
        , {
            "./helper/makeString": 20
        }],
        9: [function(e, t, n) {
            var r = e("./trim");
            t.exports = function(t) {
                return r(t).replace(/([A-Z])/g, "-$1").replace(/[-_\s]+/g, "-").toLowerCase()
            }
        }
        , {
            "./trim": 65
        }],
        10: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t) {
                return t = r(t),
                t.charAt(0).toLowerCase() + t.slice(1)
            }
        }
        , {
            "./helper/makeString": 20
        }],
        11: [function(e, t, n) {
            function i(e) {
                var t = e.match(/^[\s\\t]*/gm)
                  , n = t[0].length;
                for (var r = 1; r < t.length; r++)
                    n = Math.min(t[r].length, n);
                return n
            }
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                t = r(t);
                var s = i(t), o;
                return s === 0 ? t : (typeof n == "string" ? o = new RegExp("^" + n,"gm") : o = new RegExp("^[ \\t]{" + s + "}","gm"),
                t.replace(o, ""))
            }
        }
        , {
            "./helper/makeString": 20
        }],
        12: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/toPositive");
            t.exports = function(t, n, s) {
                return t = r(t),
                n = "" + n,
                typeof s == "undefined" ? s = t.length - n.length : s = Math.min(i(s), t.length) - n.length,
                s >= 0 && t.indexOf(n, s) === s
            }
        }
        , {
            "./helper/makeString": 20,
            "./helper/toPositive": 22
        }],
        13: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/escapeChars")
              , s = "[";
            for (var o in i)
                s += o;
            s += "]";
            var u = new RegExp(s,"g");
            t.exports = function(t) {
                return r(t).replace(u, function(e) {
                    return "&" + i[e] + ";"
                })
            }
        }
        , {
            "./helper/escapeChars": 17,
            "./helper/makeString": 20
        }],
        14: [function(e, t, n) {
            t.exports = function() {
                var e = {};
                for (var t in this) {
                    if (!this.hasOwnProperty(t) || t.match(/^(?:include|contains|reverse|join|map|wrap)$/))
                        continue;
                    e[t] = this[t]
                }
                return e
            }
        }
        , {}],
        15: [function(e, t, n) {
            var r = e("./makeString");
            t.exports = function(t, n) {
                return t = r(t),
                t.length === 0 ? "" : t.slice(0, -1) + String.fromCharCode(t.charCodeAt(t.length - 1) + n)
            }
        }
        , {
            "./makeString": 20
        }],
        16: [function(e, t, n) {
            var r = e("./escapeRegExp");
            t.exports = function(t) {
                return t == null ? "\\s" : t.source ? t.source : "[" + r(t) + "]"
            }
        }
        , {
            "./escapeRegExp": 18
        }],
        17: [function(e, t, n) {
            var r = {
                "¢": "cent",
                "£": "pound",
                "¥": "yen",
                "€": "euro",
                "©": "copy",
                "®": "reg",
                "<": "lt",
                ">": "gt",
                '"': "quot",
                "&": "amp",
                "'": "#39"
            };
            t.exports = r
        }
        , {}],
        18: [function(e, t, n) {
            var r = e("./makeString");
            t.exports = function(t) {
                return r(t).replace(/([.*+?^=!:${}()|[\]\/\\])/g, "\\$1")
            }
        }
        , {
            "./makeString": 20
        }],
        19: [function(e, t, n) {
            var r = {
                nbsp: " ",
                cent: "¢",
                pound: "£",
                yen: "¥",
                euro: "€",
                copy: "©",
                reg: "®",
                lt: "<",
                gt: ">",
                quot: '"',
                amp: "&",
                apos: "'"
            };
            t.exports = r
        }
        , {}],
        20: [function(e, t, n) {
            t.exports = function(t) {
                return t == null ? "" : "" + t
            }
        }
        , {}],
        21: [function(e, t, n) {
            t.exports = function(t, n) {
                if (n < 1)
                    return "";
                var r = "";
                while (n > 0)
                    n & 1 && (r += t),
                    n >>= 1,
                    t += t;
                return r
            }
        }
        , {}],
        22: [function(e, t, n) {
            t.exports = function(t) {
                return t < 0 ? 0 : +t || 0
            }
        }
        , {}],
        23: [function(e, t, n) {
            var r = e("./capitalize")
              , i = e("./underscored")
              , s = e("./trim");
            t.exports = function(t) {
                return r(s(i(t).replace(/_id$/, "").replace(/_/g, " ")))
            }
        }
        , {
            "./capitalize": 2,
            "./trim": 65,
            "./underscored": 67
        }],
        24: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                return n === "" ? !0 : r(t).indexOf(n) !== -1
            }
        }
        , {
            "./helper/makeString": 20
        }],
        25: [function(e, t, n) {
            "use strict";
            function r(e) {
                if (!(this instanceof r))
                    return new r(e);
                this._wrapped = e
            }
            function i(e, t) {
                if (typeof t != "function")
                    return;
                r.prototype[e] = function() {
                    var e = [this._wrapped].concat(Array.prototype.slice.call(arguments))
                      , n = t.apply(null, e);
                    return typeof n == "string" ? new r(n) : n
                }
            }
            function o(e) {
                i(e, function(t) {
                    var n = Array.prototype.slice.call(arguments, 1);
                    return String.prototype[e].apply(t, n)
                })
            }
            r.VERSION = "3.3.4",
            r.isBlank = e("./isBlank"),
            r.stripTags = e("./stripTags"),
            r.capitalize = e("./capitalize"),
            r.decapitalize = e("./decapitalize"),
            r.chop = e("./chop"),
            r.trim = e("./trim"),
            r.clean = e("./clean"),
            r.cleanDiacritics = e("./cleanDiacritics"),
            r.count = e("./count"),
            r.chars = e("./chars"),
            r.swapCase = e("./swapCase"),
            r.escapeHTML = e("./escapeHTML"),
            r.unescapeHTML = e("./unescapeHTML"),
            r.splice = e("./splice"),
            r.insert = e("./insert"),
            r.replaceAll = e("./replaceAll"),
            r.include = e("./include"),
            r.join = e("./join"),
            r.lines = e("./lines"),
            r.dedent = e("./dedent"),
            r.reverse = e("./reverse"),
            r.startsWith = e("./startsWith"),
            r.endsWith = e("./endsWith"),
            r.pred = e("./pred"),
            r.succ = e("./succ"),
            r.titleize = e("./titleize"),
            r.camelize = e("./camelize"),
            r.underscored = e("./underscored"),
            r.dasherize = e("./dasherize"),
            r.classify = e("./classify"),
            r.humanize = e("./humanize"),
            r.ltrim = e("./ltrim"),
            r.rtrim = e("./rtrim"),
            r.truncate = e("./truncate"),
            r.prune = e("./prune"),
            r.words = e("./words"),
            r.pad = e("./pad"),
            r.lpad = e("./lpad"),
            r.rpad = e("./rpad"),
            r.lrpad = e("./lrpad"),
            r.sprintf = e("./sprintf"),
            r.vsprintf = e("./vsprintf"),
            r.toNumber = e("./toNumber"),
            r.numberFormat = e("./numberFormat"),
            r.strRight = e("./strRight"),
            r.strRightBack = e("./strRightBack"),
            r.strLeft = e("./strLeft"),
            r.strLeftBack = e("./strLeftBack"),
            r.toSentence = e("./toSentence"),
            r.toSentenceSerial = e("./toSentenceSerial"),
            r.slugify = e("./slugify"),
            r.surround = e("./surround"),
            r.quote = e("./quote"),
            r.unquote = e("./unquote"),
            r.repeat = e("./repeat"),
            r.naturalCmp = e("./naturalCmp"),
            r.levenshtein = e("./levenshtein"),
            r.toBoolean = e("./toBoolean"),
            r.exports = e("./exports"),
            r.escapeRegExp = e("./helper/escapeRegExp"),
            r.wrap = e("./wrap"),
            r.map = e("./map"),
            r.strip = r.trim,
            r.lstrip = r.ltrim,
            r.rstrip = r.rtrim,
            r.center = r.lrpad,
            r.rjust = r.lpad,
            r.ljust = r.rpad,
            r.contains = r.include,
            r.q = r.quote,
            r.toBool = r.toBoolean,
            r.camelcase = r.camelize,
            r.mapChars = r.map,
            r.prototype = {
                value: function() {
                    return this._wrapped
                }
            };
            for (var s in r)
                i(s, r[s]);
            i("tap", function(t, n) {
                return n(t)
            });
            var u = ["toUpperCase", "toLowerCase", "split", "replace", "slice", "substring", "substr", "concat"];
            for (var a in u)
                o(u[a]);
            t.exports = r
        }
        , {
            "./camelize": 1,
            "./capitalize": 2,
            "./chars": 3,
            "./chop": 4,
            "./classify": 5,
            "./clean": 6,
            "./cleanDiacritics": 7,
            "./count": 8,
            "./dasherize": 9,
            "./decapitalize": 10,
            "./dedent": 11,
            "./endsWith": 12,
            "./escapeHTML": 13,
            "./exports": 14,
            "./helper/escapeRegExp": 18,
            "./humanize": 23,
            "./include": 24,
            "./insert": 26,
            "./isBlank": 27,
            "./join": 28,
            "./levenshtein": 29,
            "./lines": 30,
            "./lpad": 31,
            "./lrpad": 32,
            "./ltrim": 33,
            "./map": 34,
            "./naturalCmp": 35,
            "./numberFormat": 38,
            "./pad": 39,
            "./pred": 40,
            "./prune": 41,
            "./quote": 42,
            "./repeat": 43,
            "./replaceAll": 44,
            "./reverse": 45,
            "./rpad": 46,
            "./rtrim": 47,
            "./slugify": 48,
            "./splice": 49,
            "./sprintf": 50,
            "./startsWith": 51,
            "./strLeft": 52,
            "./strLeftBack": 53,
            "./strRight": 54,
            "./strRightBack": 55,
            "./stripTags": 56,
            "./succ": 57,
            "./surround": 58,
            "./swapCase": 59,
            "./titleize": 60,
            "./toBoolean": 61,
            "./toNumber": 62,
            "./toSentence": 63,
            "./toSentenceSerial": 64,
            "./trim": 65,
            "./truncate": 66,
            "./underscored": 67,
            "./unescapeHTML": 68,
            "./unquote": 69,
            "./vsprintf": 70,
            "./words": 71,
            "./wrap": 72
        }],
        26: [function(e, t, n) {
            var r = e("./splice");
            t.exports = function(t, n, i) {
                return r(t, n, 0, i)
            }
        }
        , {
            "./splice": 49
        }],
        27: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t) {
                return /^\s*$/.test(r(t))
            }
        }
        , {
            "./helper/makeString": 20
        }],
        28: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = [].slice;
            t.exports = function() {
                var t = i.call(arguments)
                  , n = t.shift();
                return t.join(r(n))
            }
        }
        , {
            "./helper/makeString": 20
        }],
        29: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                "use strict";
                t = r(t),
                n = r(n);
                if (t === n)
                    return 0;
                if (!t || !n)
                    return Math.max(t.length, n.length);
                var i = new Array(n.length + 1);
                for (var s = 0; s < i.length; ++s)
                    i[s] = s;
                for (s = 0; s < t.length; ++s) {
                    var o = s + 1;
                    for (var u = 0; u < n.length; ++u) {
                        var a = o;
                        o = i[u] + (t.charAt(s) === n.charAt(u) ? 0 : 1);
                        var f = a + 1;
                        o > f && (o = f),
                        f = i[u + 1] + 1,
                        o > f && (o = f),
                        i[u] = a
                    }
                    i[u] = o
                }
                return o
            }
        }
        , {
            "./helper/makeString": 20
        }],
        30: [function(e, t, n) {
            t.exports = function(t) {
                return t == null ? [] : String(t).split(/\r\n?|\n/)
            }
        }
        , {}],
        31: [function(e, t, n) {
            var r = e("./pad");
            t.exports = function(t, n, i) {
                return r(t, n, i)
            }
        }
        , {
            "./pad": 39
        }],
        32: [function(e, t, n) {
            var r = e("./pad");
            t.exports = function(t, n, i) {
                return r(t, n, i, "both")
            }
        }
        , {
            "./pad": 39
        }],
        33: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/defaultToWhiteSpace")
              , s = String.prototype.trimLeft;
            t.exports = function(t, n) {
                return t = r(t),
                !n && s ? s.call(t) : (n = i(n),
                t.replace(new RegExp("^" + n + "+"), ""))
            }
        }
        , {
            "./helper/defaultToWhiteSpace": 16,
            "./helper/makeString": 20
        }],
        34: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(e, t) {
                return e = r(e),
                e.length === 0 || typeof t != "function" ? e : e.replace(/./g, t)
            }
        }
        , {
            "./helper/makeString": 20
        }],
        35: [function(e, t, n) {
            t.exports = function(t, n) {
                if (t == n)
                    return 0;
                if (!t)
                    return -1;
                if (!n)
                    return 1;
                var r = /(\.\d+|\d+|\D+)/g
                  , i = String(t).match(r)
                  , s = String(n).match(r)
                  , o = Math.min(i.length, s.length);
                for (var u = 0; u < o; u++) {
                    var a = i[u]
                      , f = s[u];
                    if (a !== f) {
                        var l = +a
                          , c = +f;
                        return l === l && c === c ? l > c ? 1 : -1 : a < f ? -1 : 1
                    }
                }
                return i.length != s.length ? i.length - s.length : t < n ? -1 : 1
            }
        }
        , {}],
        36: [function(t, n, r) {
            (function(t) {
                function i() {
                    var e = arguments[0]
                      , t = i.cache;
                    if (!t[e] || !t.hasOwnProperty(e))
                        t[e] = i.parse(e);
                    return i.format.call(null, t[e], arguments)
                }
                function o(e) {
                    return Object.prototype.toString.call(e).slice(8, -1).toLowerCase()
                }
                function u(e, t) {
                    return Array(t + 1).join(e)
                }
                var n = {
                    not_string: /[^s]/,
                    number: /[diefg]/,
                    json: /[j]/,
                    not_json: /[^j]/,
                    text: /^[^\x25]+/,
                    modulo: /^\x25{2}/,
                    placeholder: /^\x25(?:([1-9]\d*)\$|\(([^\)]+)\))?(\+)?(0|'[^$])?(-)?(\d+)?(?:\.(\d+))?([b-gijosuxX])/,
                    key: /^([a-z_][a-z_\d]*)/i,
                    key_access: /^\.([a-z_][a-z_\d]*)/i,
                    index_access: /^\[(\d+)\]/,
                    sign: /^[\+\-]/
                };
                i.format = function(e, t) {
                    var r = 1, s = e.length, a = "", f, l = [], c, h, p, d, v, m, g = !0, y = "";
                    for (c = 0; c < s; c++) {
                        a = o(e[c]);
                        if (a === "string")
                            l[l.length] = e[c];
                        else if (a === "array") {
                            p = e[c];
                            if (p[2]) {
                                f = t[r];
                                for (h = 0; h < p[2].length; h++) {
                                    if (!f.hasOwnProperty(p[2][h]))
                                        throw new Error(i("[sprintf] property '%s' does not exist", p[2][h]));
                                    f = f[p[2][h]]
                                }
                            } else
                                p[1] ? f = t[p[1]] : f = t[r++];
                            o(f) == "function" && (f = f());
                            if (n.not_string.test(p[8]) && n.not_json.test(p[8]) && o(f) != "number" && isNaN(f))
                                throw new TypeError(i("[sprintf] expecting number but found %s", o(f)));
                            n.number.test(p[8]) && (g = f >= 0);
                            switch (p[8]) {
                            case "b":
                                f = f.toString(2);
                                break;
                            case "c":
                                f = String.fromCharCode(f);
                                break;
                            case "d":
                            case "i":
                                f = parseInt(f, 10);
                                break;
                            case "j":
                                f = JSON.stringify(f, null, p[6] ? parseInt(p[6]) : 0);
                                break;
                            case "e":
                                f = p[7] ? f.toExponential(p[7]) : f.toExponential();
                                break;
                            case "f":
                                f = p[7] ? parseFloat(f).toFixed(p[7]) : parseFloat(f);
                                break;
                            case "g":
                                f = p[7] ? parseFloat(f).toPrecision(p[7]) : parseFloat(f);
                                break;
                            case "o":
                                f = f.toString(8);
                                break;
                            case "s":
                                f = (f = String(f)) && p[7] ? f.substring(0, p[7]) : f;
                                break;
                            case "u":
                                f >>>= 0;
                                break;
                            case "x":
                                f = f.toString(16);
                                break;
                            case "X":
                                f = f.toString(16).toUpperCase()
                            }
                            n.json.test(p[8]) ? l[l.length] = f : (n.number.test(p[8]) && (!g || p[3]) ? (y = g ? "+" : "-",
                            f = f.toString().replace(n.sign, "")) : y = "",
                            v = p[4] ? p[4] === "0" ? "0" : p[4].charAt(1) : " ",
                            m = p[6] - (y + f).length,
                            d = p[6] ? m > 0 ? u(v, m) : "" : "",
                            l[l.length] = p[5] ? y + f + d : v === "0" ? y + d + f : d + y + f)
                        }
                    }
                    return l.join("")
                }
                ,
                i.cache = {},
                i.parse = function(e) {
                    var t = e
                      , r = []
                      , i = []
                      , s = 0;
                    while (t) {
                        if ((r = n.text.exec(t)) !== null)
                            i[i.length] = r[0];
                        else if ((r = n.modulo.exec(t)) !== null)
                            i[i.length] = "%";
                        else {
                            if ((r = n.placeholder.exec(t)) === null)
                                throw new SyntaxError("[sprintf] unexpected placeholder");
                            if (r[2]) {
                                s |= 1;
                                var o = []
                                  , u = r[2]
                                  , a = [];
                                if ((a = n.key.exec(u)) === null)
                                    throw new SyntaxError("[sprintf] failed to parse named argument key");
                                o[o.length] = a[1];
                                while ((u = u.substring(a[0].length)) !== "")
                                    if ((a = n.key_access.exec(u)) !== null)
                                        o[o.length] = a[1];
                                    else {
                                        if ((a = n.index_access.exec(u)) === null)
                                            throw new SyntaxError("[sprintf] failed to parse named argument key");
                                        o[o.length] = a[1]
                                    }
                                r[2] = o
                            } else
                                s |= 2;
                            if (s === 3)
                                throw new Error("[sprintf] mixing positional and named placeholders is not (yet) supported");
                            i[i.length] = r
                        }
                        t = t.substring(r[0].length)
                    }
                    return i
                }
                ;
                var s = function(e, t, n) {
                    return n = (t || []).slice(0),
                    n.splice(0, 0, e),
                    i.apply(null, n)
                };
                typeof r != "undefined" ? (r.sprintf = i,
                r.vsprintf = s) : (t.sprintf = i,
                t.vsprintf = s,
                typeof e == "function" && e.amd && e(function() {
                    return {
                        sprintf: i,
                        vsprintf: s
                    }
                }))
            }
            )(typeof window == "undefined" ? this : window)
        }
        , {}],
        37: [function(e, t, n) {
            (function(e) {
                function n(e, t) {
                    function i() {
                        if (!n) {
                            if (r("throwDeprecation"))
                                throw new Error(t);
                            r("traceDeprecation") ? console.trace(t) : console.warn(t),
                            n = !0
                        }
                        return e.apply(this, arguments)
                    }
                    if (r("noDeprecation"))
                        return e;
                    var n = !1;
                    return i
                }
                function r(t) {
                    try {
                        if (!e.localStorage)
                            return !1
                    } catch (n) {
                        return !1
                    }
                    var r = e.localStorage[t];
                    return null == r ? !1 : String(r).toLowerCase() === "true"
                }
                t.exports = n
            }
            ).call(this, typeof global != "undefined" ? global : typeof self != "undefined" ? self : typeof window != "undefined" ? window : {})
        }
        , {}],
        38: [function(e, t, n) {
            t.exports = function(t, n, r, i) {
                if (isNaN(t) || t == null)
                    return "";
                t = t.toFixed(~~n),
                i = typeof i == "string" ? i : ",";
                var s = t.split(".")
                  , o = s[0]
                  , u = s[1] ? (r || ".") + s[1] : "";
                return o.replace(/(\d)(?=(?:\d{3})+$)/g, "$1" + i) + u
            }
        }
        , {}],
        39: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/strRepeat");
            t.exports = function(t, n, s, o) {
                t = r(t),
                n = ~~n;
                var u = 0;
                s ? s.length > 1 && (s = s.charAt(0)) : s = " ";
                switch (o) {
                case "right":
                    return u = n - t.length,
                    t + i(s, u);
                case "both":
                    return u = n - t.length,
                    i(s, Math.ceil(u / 2)) + t + i(s, Math.floor(u / 2));
                default:
                    return u = n - t.length,
                    i(s, u) + t
                }
            }
        }
        , {
            "./helper/makeString": 20,
            "./helper/strRepeat": 21
        }],
        40: [function(e, t, n) {
            var r = e("./helper/adjacent");
            t.exports = function(t) {
                return r(t, -1)
            }
        }
        , {
            "./helper/adjacent": 15
        }],
        41: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./rtrim");
            t.exports = function(t, n, s) {
                t = r(t),
                n = ~~n,
                s = s != null ? String(s) : "...";
                if (t.length <= n)
                    return t;
                var o = function(e) {
                    return e.toUpperCase() !== e.toLowerCase() ? "A" : " "
                }
                  , u = t.slice(0, n + 1).replace(/.(?=\W*\w*$)/g, o);
                return u.slice(u.length - 2).match(/\w\w/) ? u = u.replace(/\s*\S+$/, "") : u = i(u.slice(0, u.length - 1)),
                (u + s).length > t.length ? t : t.slice(0, u.length) + s
            }
        }
        , {
            "./helper/makeString": 20,
            "./rtrim": 47
        }],
        42: [function(e, t, n) {
            var r = e("./surround");
            t.exports = function(t, n) {
                return r(t, n || '"')
            }
        }
        , {
            "./surround": 58
        }],
        43: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/strRepeat");
            t.exports = function s(e, t, n) {
                e = r(e),
                t = ~~t;
                if (n == null)
                    return i(e, t);
                for (var s = []; t > 0; s[--t] = e)
                    ;
                return s.join(n)
            }
        }
        , {
            "./helper/makeString": 20,
            "./helper/strRepeat": 21
        }],
        44: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n, i, s) {
                var o = s === !0 ? "gi" : "g"
                  , u = new RegExp(n,o);
                return r(t).replace(u, i)
            }
        }
        , {
            "./helper/makeString": 20
        }],
        45: [function(e, t, n) {
            var r = e("./chars");
            t.exports = function(t) {
                return r(t).reverse().join("")
            }
        }
        , {
            "./chars": 3
        }],
        46: [function(e, t, n) {
            var r = e("./pad");
            t.exports = function(t, n, i) {
                return r(t, n, i, "right")
            }
        }
        , {
            "./pad": 39
        }],
        47: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/defaultToWhiteSpace")
              , s = String.prototype.trimRight;
            t.exports = function(t, n) {
                return t = r(t),
                !n && s ? s.call(t) : (n = i(n),
                t.replace(new RegExp(n + "+$"), ""))
            }
        }
        , {
            "./helper/defaultToWhiteSpace": 16,
            "./helper/makeString": 20
        }],
        48: [function(e, t, n) {
            var r = e("./trim")
              , i = e("./dasherize")
              , s = e("./cleanDiacritics");
            t.exports = function(t) {
                return r(i(s(t).replace(/[^\w\s-]/g, "-").toLowerCase()), "-")
            }
        }
        , {
            "./cleanDiacritics": 7,
            "./dasherize": 9,
            "./trim": 65
        }],
        49: [function(e, t, n) {
            var r = e("./chars");
            t.exports = function(t, n, i, s) {
                var o = r(t);
                return o.splice(~~n, ~~i, s),
                o.join("")
            }
        }
        , {
            "./chars": 3
        }],
        50: [function(e, t, n) {
            var r = e("util-deprecate");
            t.exports = r(e("sprintf-js").sprintf, "sprintf() will be removed in the next major release, use the sprintf-js package instead.")
        }
        , {
            "sprintf-js": 36,
            "util-deprecate": 37
        }],
        51: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/toPositive");
            t.exports = function(t, n, s) {
                return t = r(t),
                n = "" + n,
                s = s == null ? 0 : Math.min(i(s), t.length),
                t.lastIndexOf(n, s) === s
            }
        }
        , {
            "./helper/makeString": 20,
            "./helper/toPositive": 22
        }],
        52: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                t = r(t),
                n = r(n);
                var i = n ? t.indexOf(n) : -1;
                return ~i ? t.slice(0, i) : t
            }
        }
        , {
            "./helper/makeString": 20
        }],
        53: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                t = r(t),
                n = r(n);
                var i = t.lastIndexOf(n);
                return ~i ? t.slice(0, i) : t
            }
        }
        , {
            "./helper/makeString": 20
        }],
        54: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                t = r(t),
                n = r(n);
                var i = n ? t.indexOf(n) : -1;
                return ~i ? t.slice(i + n.length, t.length) : t
            }
        }
        , {
            "./helper/makeString": 20
        }],
        55: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                t = r(t),
                n = r(n);
                var i = n ? t.lastIndexOf(n) : -1;
                return ~i ? t.slice(i + n.length, t.length) : t
            }
        }
        , {
            "./helper/makeString": 20
        }],
        56: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t) {
                return r(t).replace(/<\/?[^>]+>/g, "")
            }
        }
        , {
            "./helper/makeString": 20
        }],
        57: [function(e, t, n) {
            var r = e("./helper/adjacent");
            t.exports = function(t) {
                return r(t, 1)
            }
        }
        , {
            "./helper/adjacent": 15
        }],
        58: [function(e, t, n) {
            t.exports = function(t, n) {
                return [n, t, n].join("")
            }
        }
        , {}],
        59: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t) {
                return r(t).replace(/\S/g, function(e) {
                    return e === e.toUpperCase() ? e.toLowerCase() : e.toUpperCase()
                })
            }
        }
        , {
            "./helper/makeString": 20
        }],
        60: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t) {
                return r(t).toLowerCase().replace(/(?:^|\s|-)\S/g, function(e) {
                    return e.toUpperCase()
                })
            }
        }
        , {
            "./helper/makeString": 20
        }],
        61: [function(e, t, n) {
            function i(e, t) {
                var n, r, i = e.toLowerCase();
                t = [].concat(t);
                for (n = 0; n < t.length; n += 1) {
                    r = t[n];
                    if (!r)
                        continue;
                    if (r.test && r.test(e))
                        return !0;
                    if (r.toLowerCase() === i)
                        return !0
                }
            }
            var r = e("./trim");
            t.exports = function(t, n, s) {
                typeof t == "number" && (t = "" + t);
                if (typeof t != "string")
                    return !!t;
                t = r(t);
                if (i(t, n || ["true", "1"]))
                    return !0;
                if (i(t, s || ["false", "0"]))
                    return !1
            }
        }
        , {
            "./trim": 65
        }],
        62: [function(e, t, n) {
            t.exports = function(t, n) {
                if (t == null)
                    return 0;
                var r = Math.pow(10, isFinite(n) ? n : 0);
                return Math.round(t * r) / r
            }
        }
        , {}],
        63: [function(e, t, n) {
            var r = e("./rtrim");
            t.exports = function(t, n, i, s) {
                n = n || ", ",
                i = i || " and ";
                var o = t.slice()
                  , u = o.pop();
                return t.length > 2 && s && (i = r(n) + i),
                o.length ? o.join(n) + i + u : u
            }
        }
        , {
            "./rtrim": 47
        }],
        64: [function(e, t, n) {
            var r = e("./toSentence");
            t.exports = function(t, n, i) {
                return r(t, n, i, !0)
            }
        }
        , {
            "./toSentence": 63
        }],
        65: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/defaultToWhiteSpace")
              , s = String.prototype.trim;
            t.exports = function(t, n) {
                return t = r(t),
                !n && s ? s.call(t) : (n = i(n),
                t.replace(new RegExp("^" + n + "+|" + n + "+$","g"), ""))
            }
        }
        , {
            "./helper/defaultToWhiteSpace": 16,
            "./helper/makeString": 20
        }],
        66: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n, i) {
                return t = r(t),
                i = i || "...",
                n = ~~n,
                t.length > n ? t.slice(0, n) + i : t
            }
        }
        , {
            "./helper/makeString": 20
        }],
        67: [function(e, t, n) {
            var r = e("./trim");
            t.exports = function(t) {
                return r(t).replace(/([a-z\d])([A-Z]+)/g, "$1_$2").replace(/[-\s]+/g, "_").toLowerCase()
            }
        }
        , {
            "./trim": 65
        }],
        68: [function(e, t, n) {
            var r = e("./helper/makeString")
              , i = e("./helper/htmlEntities");
            t.exports = function(t) {
                return r(t).replace(/\&([^;]+);/g, function(e, t) {
                    var n;
                    return t in i ? i[t] : (n = t.match(/^#x([\da-fA-F]+)$/)) ? String.fromCharCode(parseInt(n[1], 16)) : (n = t.match(/^#(\d+)$/)) ? String.fromCharCode(~~n[1]) : e
                })
            }
        }
        , {
            "./helper/htmlEntities": 19,
            "./helper/makeString": 20
        }],
        69: [function(e, t, n) {
            t.exports = function(t, n) {
                return n = n || '"',
                t[0] === n && t[t.length - 1] === n ? t.slice(1, t.length - 1) : t
            }
        }
        , {}],
        70: [function(e, t, n) {
            var r = e("util-deprecate");
            t.exports = r(e("sprintf-js").vsprintf, "vsprintf() will be removed in the next major release, use the sprintf-js package instead.")
        }
        , {
            "sprintf-js": 36,
            "util-deprecate": 37
        }],
        71: [function(e, t, n) {
            var r = e("./isBlank")
              , i = e("./trim");
            t.exports = function(t, n) {
                return r(t) ? [] : i(t, n).split(n || /\s+/)
            }
        }
        , {
            "./isBlank": 27,
            "./trim": 65
        }],
        72: [function(e, t, n) {
            var r = e("./helper/makeString");
            t.exports = function(t, n) {
                t = r(t),
                n = n || {};
                var i = n.width || 75, s = n.seperator || "\n", o = n.cut || !1, u = n.preserveSpaces || !1, a = n.trailingSpaces || !1, f;
                if (i <= 0)
                    return t;
                if (!o) {
                    var l = t.split(" ")
                      , c = 0;
                    f = "";
                    while (l.length > 0) {
                        if (1 + l[0].length + c > i && c > 0) {
                            if (u)
                                f += " ",
                                c++;
                            else if (a)
                                while (c < i)
                                    f += " ",
                                    c++;
                            f += s,
                            c = 0
                        }
                        c > 0 && (f += " ",
                        c++),
                        f += l[0],
                        c += l[0].length,
                        l.shift()
                    }
                    if (a)
                        while (c < i)
                            f += " ",
                            c++;
                    return f
                }
                var h = 0;
                f = "";
                while (h < t.length)
                    h % i == 0 && h > 0 && (f += s),
                    f += t.charAt(h),
                    h++;
                if (a)
                    while (h % i > 0)
                        f += " ",
                        h++;
                return f
            }
        }
        , {
            "./helper/makeString": 20
        }]
    }, {}, [25])(25)
});
_.mixin(s.exports());
(function(e) {
    var t = typeof self == "object" && self.self === self && self || typeof global == "object" && global.global === global && global;
    if (typeof define == "function" && define.amd)
        define(["underscore", "jquery", "exports"], function(n, r, i) {
            t.Backbone = e(t, i, n, r)
        });
    else if (typeof exports != "undefined") {
        var n = require("underscore"), r;
        try {
            r = require("jquery")
        } catch (i) {}
        e(t, exports, n, r)
    } else
        t.Backbone = e(t, {}, t._, t.jQuery || t.Zepto || t.ender || t.$)
}
)(function(e, t, n, r) {
    var i = e.Backbone
      , s = Array.prototype.slice;
    t.VERSION = "1.3.3",
    t.$ = r,
    t.noConflict = function() {
        return e.Backbone = i,
        this
    }
    ,
    t.emulateHTTP = !1,
    t.emulateJSON = !1;
    var o = function(e, t, r) {
        switch (e) {
        case 1:
            return function() {
                return n[t](this[r])
            }
            ;
        case 2:
            return function(e) {
                return n[t](this[r], e)
            }
            ;
        case 3:
            return function(e, i) {
                return n[t](this[r], a(e, this), i)
            }
            ;
        case 4:
            return function(e, i, s) {
                return n[t](this[r], a(e, this), i, s)
            }
            ;
        default:
            return function() {
                var e = s.call(arguments);
                return e.unshift(this[r]),
                n[t].apply(n, e)
            }
        }
    }
      , u = function(e, t, r) {
        n.each(t, function(t, i) {
            n[i] && (e.prototype[i] = o(t, i, r))
        })
    }
      , a = function(e, t) {
        return n.isFunction(e) ? e : n.isObject(e) && !t._isModel(e) ? f(e) : n.isString(e) ? function(t) {
            return t.get(e)
        }
        : e
    }
      , f = function(e) {
        var t = n.matches(e);
        return function(e) {
            return t(e.attributes)
        }
    }
      , l = t.Events = {}
      , c = /\s+/
      , h = function(e, t, r, i, s) {
        var o = 0, u;
        if (r && typeof r == "object") {
            i !== void 0 && "context"in s && s.context === void 0 && (s.context = i);
            for (u = n.keys(r); o < u.length; o++)
                t = h(e, t, u[o], r[u[o]], s)
        } else if (r && c.test(r))
            for (u = r.split(c); o < u.length; o++)
                t = e(t, u[o], i, s);
        else
            t = e(t, r, i, s);
        return t
    };
    l.on = function(e, t, n) {
        return p(this, e, t, n)
    }
    ;
    var p = function(e, t, n, r, i) {
        e._events = h(d, e._events || {}, t, n, {
            context: r,
            ctx: e,
            listening: i
        });
        if (i) {
            var s = e._listeners || (e._listeners = {});
            s[i.id] = i
        }
        return e
    };
    l.listenTo = function(e, t, r) {
        if (!e)
            return this;
        var i = e._listenId || (e._listenId = n.uniqueId("l"))
          , s = this._listeningTo || (this._listeningTo = {})
          , o = s[i];
        if (!o) {
            var u = this._listenId || (this._listenId = n.uniqueId("l"));
            o = s[i] = {
                obj: e,
                objId: i,
                id: u,
                listeningTo: s,
                count: 0
            }
        }
        return p(e, t, r, this, o),
        this
    }
    ;
    var d = function(e, t, n, r) {
        if (n) {
            var i = e[t] || (e[t] = [])
              , s = r.context
              , o = r.ctx
              , u = r.listening;
            u && u.count++,
            i.push({
                callback: n,
                context: s,
                ctx: s || o,
                listening: u
            })
        }
        return e
    };
    l.off = function(e, t, n) {
        return this._events ? (this._events = h(v, this._events, e, t, {
            context: n,
            listeners: this._listeners
        }),
        this) : this
    }
    ,
    l.stopListening = function(e, t, r) {
        var i = this._listeningTo;
        if (!i)
            return this;
        var s = e ? [e._listenId] : n.keys(i);
        for (var o = 0; o < s.length; o++) {
            var u = i[s[o]];
            if (!u)
                break;
            u.obj.off(t, r, this)
        }
        return this
    }
    ;
    var v = function(e, t, r, i) {
        if (!e)
            return;
        var s = 0, o, u = i.context, a = i.listeners;
        if (!t && !r && !u) {
            var f = n.keys(a);
            for (; s < f.length; s++)
                o = a[f[s]],
                delete a[o.id],
                delete o.listeningTo[o.objId];
            return
        }
        var l = t ? [t] : n.keys(e);
        for (; s < l.length; s++) {
            t = l[s];
            var c = e[t];
            if (!c)
                break;
            var h = [];
            for (var p = 0; p < c.length; p++) {
                var d = c[p];
                r && r !== d.callback && r !== d.callback._callback || u && u !== d.context ? h.push(d) : (o = d.listening,
                o && --o.count === 0 && (delete a[o.id],
                delete o.listeningTo[o.objId]))
            }
            h.length ? e[t] = h : delete e[t]
        }
        return e
    };
    l.once = function(e, t, r) {
        var i = h(m, {}, e, t, n.bind(this.off, this));
        return typeof e == "string" && r == null && (t = void 0),
        this.on(i, t, r)
    }
    ,
    l.listenToOnce = function(e, t, r) {
        var i = h(m, {}, t, r, n.bind(this.stopListening, this, e));
        return this.listenTo(e, i)
    }
    ;
    var m = function(e, t, r, i) {
        if (r) {
            var s = e[t] = n.once(function() {
                i(t, s),
                r.apply(this, arguments)
            });
            s._callback = r
        }
        return e
    };
    l.trigger = function(e) {
        if (!this._events)
            return this;
        var t = Math.max(0, arguments.length - 1)
          , n = Array(t);
        for (var r = 0; r < t; r++)
            n[r] = arguments[r + 1];
        return h(g, this._events, e, void 0, n),
        this
    }
    ;
    var g = function(e, t, n, r) {
        if (e) {
            var i = e[t]
              , s = e.all;
            i && s && (s = s.slice()),
            i && y(i, r),
            s && y(s, [t].concat(r))
        }
        return e
    }
      , y = function(e, t) {
        var n, r = -1, i = e.length, s = t[0], o = t[1], u = t[2];
        switch (t.length) {
        case 0:
            while (++r < i)
                (n = e[r]).callback.call(n.ctx);
            return;
        case 1:
            while (++r < i)
                (n = e[r]).callback.call(n.ctx, s);
            return;
        case 2:
            while (++r < i)
                (n = e[r]).callback.call(n.ctx, s, o);
            return;
        case 3:
            while (++r < i)
                (n = e[r]).callback.call(n.ctx, s, o, u);
            return;
        default:
            while (++r < i)
                (n = e[r]).callback.apply(n.ctx, t);
            return
        }
    };
    l.bind = l.on,
    l.unbind = l.off,
    n.extend(t, l);
    var b = t.Model = function(e, t) {
        var r = e || {};
        t || (t = {}),
        this.cid = n.uniqueId(this.cidPrefix),
        this.attributes = {},
        t.collection && (this.collection = t.collection),
        t.parse && (r = this.parse(r, t) || {});
        var i = n.result(this, "defaults");
        r = n.defaults(n.extend({}, i, r), i),
        this.set(r, t),
        this.changed = {},
        this.initialize.apply(this, arguments)
    }
    ;
    n.extend(b.prototype, l, {
        changed: null,
        validationError: null,
        idAttribute: "id",
        cidPrefix: "c",
        initialize: function() {},
        toJSON: function(e) {
            return n.clone(this.attributes)
        },
        sync: function() {
            return t.sync.apply(this, arguments)
        },
        get: function(e) {
            return this.attributes[e]
        },
        escape: function(e) {
            return n.escape(this.get(e))
        },
        has: function(e) {
            return this.get(e) != null
        },
        matches: function(e) {
            return !!n.iteratee(e, this)(this.attributes)
        },
        set: function(e, t, r) {
            if (e == null)
                return this;
            var i;
            typeof e == "object" ? (i = e,
            r = t) : (i = {})[e] = t,
            r || (r = {});
            if (!this._validate(i, r))
                return !1;
            var s = r.unset
              , o = r.silent
              , u = []
              , a = this._changing;
            this._changing = !0,
            a || (this._previousAttributes = n.clone(this.attributes),
            this.changed = {});
            var f = this.attributes
              , l = this.changed
              , c = this._previousAttributes;
            for (var h in i)
                t = i[h],
                n.isEqual(f[h], t) || u.push(h),
                n.isEqual(c[h], t) ? delete l[h] : l[h] = t,
                s ? delete f[h] : f[h] = t;
            this.idAttribute in i && (this.id = this.get(this.idAttribute));
            if (!o) {
                u.length && (this._pending = r);
                for (var p = 0; p < u.length; p++)
                    this.trigger("change:" + u[p], this, f[u[p]], r)
            }
            if (a)
                return this;
            if (!o)
                while (this._pending)
                    r = this._pending,
                    this._pending = !1,
                    this.trigger("change", this, r);
            return this._pending = !1,
            this._changing = !1,
            this
        },
        unset: function(e, t) {
            return this.set(e, void 0, n.extend({}, t, {
                unset: !0
            }))
        },
        clear: function(e) {
            var t = {};
            for (var r in this.attributes)
                t[r] = void 0;
            return this.set(t, n.extend({}, e, {
                unset: !0
            }))
        },
        hasChanged: function(e) {
            return e == null ? !n.isEmpty(this.changed) : n.has(this.changed, e)
        },
        changedAttributes: function(e) {
            if (!e)
                return this.hasChanged() ? n.clone(this.changed) : !1;
            var t = this._changing ? this._previousAttributes : this.attributes
              , r = {};
            for (var i in e) {
                var s = e[i];
                if (n.isEqual(t[i], s))
                    continue;
                r[i] = s
            }
            return n.size(r) ? r : !1
        },
        previous: function(e) {
            return e == null || !this._previousAttributes ? null : this._previousAttributes[e]
        },
        previousAttributes: function() {
            return n.clone(this._previousAttributes)
        },
        fetch: function(e) {
            e = n.extend({
                parse: !0
            }, e);
            var t = this
              , r = e.success;
            return e.success = function(n) {
                var i = e.parse ? t.parse(n, e) : n;
                if (!t.set(i, e))
                    return !1;
                r && r.call(e.context, t, n, e),
                t.trigger("sync", t, n, e)
            }
            ,
            R(this, e),
            this.sync("read", this, e)
        },
        save: function(e, t, r) {
            var i;
            e == null || typeof e == "object" ? (i = e,
            r = t) : (i = {})[e] = t,
            r = n.extend({
                validate: !0,
                parse: !0
            }, r);
            var s = r.wait;
            if (i && !s) {
                if (!this.set(i, r))
                    return !1
            } else if (!this._validate(i, r))
                return !1;
            var o = this
              , u = r.success
              , a = this.attributes;
            r.success = function(e) {
                o.attributes = a;
                var t = r.parse ? o.parse(e, r) : e;
                s && (t = n.extend({}, i, t));
                if (t && !o.set(t, r))
                    return !1;
                u && u.call(r.context, o, e, r),
                o.trigger("sync", o, e, r)
            }
            ,
            R(this, r),
            i && s && (this.attributes = n.extend({}, a, i));
            var f = this.isNew() ? "create" : r.patch ? "patch" : "update";
            f === "patch" && !r.attrs && (r.attrs = i);
            var l = this.sync(f, this, r);
            return this.attributes = a,
            l
        },
        destroy: function(e) {
            e = e ? n.clone(e) : {};
            var t = this
              , r = e.success
              , i = e.wait
              , s = function() {
                t.stopListening(),
                t.trigger("destroy", t, t.collection, e)
            };
            e.success = function(n) {
                i && s(),
                r && r.call(e.context, t, n, e),
                t.isNew() || t.trigger("sync", t, n, e)
            }
            ;
            var o = !1;
            return this.isNew() ? n.defer(e.success) : (R(this, e),
            o = this.sync("delete", this, e)),
            i || s(),
            o
        },
        url: function() {
            var e = n.result(this, "urlRoot") || n.result(this.collection, "url") || q();
            if (this.isNew())
                return e;
            var t = this.get(this.idAttribute);
            return e.replace(/[^\/]$/, "$&/") + encodeURIComponent(t)
        },
        parse: function(e, t) {
            return e
        },
        clone: function() {
            return new this.constructor(this.attributes)
        },
        isNew: function() {
            return !this.has(this.idAttribute)
        },
        isValid: function(e) {
            return this._validate({}, n.extend({}, e, {
                validate: !0
            }))
        },
        _validate: function(e, t) {
            if (!t.validate || !this.validate)
                return !0;
            e = n.extend({}, this.attributes, e);
            var r = this.validationError = this.validate(e, t) || null;
            return r ? (this.trigger("invalid", this, r, n.extend(t, {
                validationError: r
            })),
            !1) : !0
        }
    });
    var w = {
        keys: 1,
        values: 1,
        pairs: 1,
        invert: 1,
        pick: 0,
        omit: 0,
        chain: 1,
        isEmpty: 1
    };
    u(b, w, "attributes");
    var E = t.Collection = function(e, t) {
        t || (t = {}),
        t.model && (this.model = t.model),
        t.comparator !== void 0 && (this.comparator = t.comparator),
        this._reset(),
        this.initialize.apply(this, arguments),
        e && this.reset(e, n.extend({
            silent: !0
        }, t))
    }
      , S = {
        add: !0,
        remove: !0,
        merge: !0
    }
      , x = {
        add: !0,
        remove: !1
    }
      , T = function(e, t, n) {
        n = Math.min(Math.max(n, 0), e.length);
        var r = Array(e.length - n), i = t.length, s;
        for (s = 0; s < r.length; s++)
            r[s] = e[s + n];
        for (s = 0; s < i; s++)
            e[s + n] = t[s];
        for (s = 0; s < r.length; s++)
            e[s + i + n] = r[s]
    };
    n.extend(E.prototype, l, {
        model: b,
        initialize: function() {},
        toJSON: function(e) {
            return this.map(function(t) {
                return t.toJSON(e)
            })
        },
        sync: function() {
            return t.sync.apply(this, arguments)
        },
        add: function(e, t) {
            return this.set(e, n.extend({
                merge: !1
            }, t, x))
        },
        remove: function(e, t) {
            t = n.extend({}, t);
            var r = !n.isArray(e);
            e = r ? [e] : e.slice();
            var i = this._removeModels(e, t);
            return !t.silent && i.length && (t.changes = {
                added: [],
                merged: [],
                removed: i
            },
            this.trigger("update", this, t)),
            r ? i[0] : i
        },
        set: function(e, t) {
            if (e == null)
                return;
            t = n.extend({}, S, t),
            t.parse && !this._isModel(e) && (e = this.parse(e, t) || []);
            var r = !n.isArray(e);
            e = r ? [e] : e.slice();
            var i = t.at;
            i != null && (i = +i),
            i > this.length && (i = this.length),
            i < 0 && (i += this.length + 1);
            var s = [], o = [], u = [], a = [], f = {}, l = t.add, c = t.merge, h = t.remove, p = !1, d = this.comparator && i == null && t.sort !== !1, v = n.isString(this.comparator) ? this.comparator : null, m, g;
            for (g = 0; g < e.length; g++) {
                m = e[g];
                var y = this.get(m);
                if (y) {
                    if (c && m !== y) {
                        var b = this._isModel(m) ? m.attributes : m;
                        t.parse && (b = y.parse(b, t)),
                        y.set(b, t),
                        u.push(y),
                        d && !p && (p = y.hasChanged(v))
                    }
                    f[y.cid] || (f[y.cid] = !0,
                    s.push(y)),
                    e[g] = y
                } else
                    l && (m = e[g] = this._prepareModel(m, t),
                    m && (o.push(m),
                    this._addReference(m, t),
                    f[m.cid] = !0,
                    s.push(m)))
            }
            if (h) {
                for (g = 0; g < this.length; g++)
                    m = this.models[g],
                    f[m.cid] || a.push(m);
                a.length && this._removeModels(a, t)
            }
            var w = !1
              , E = !d && l && h;
            s.length && E ? (w = this.length !== s.length || n.some(this.models, function(e, t) {
                return e !== s[t]
            }),
            this.models.length = 0,
            T(this.models, s, 0),
            this.length = this.models.length) : o.length && (d && (p = !0),
            T(this.models, o, i == null ? this.length : i),
            this.length = this.models.length),
            p && this.sort({
                silent: !0
            });
            if (!t.silent) {
                for (g = 0; g < o.length; g++)
                    i != null && (t.index = i + g),
                    m = o[g],
                    m.trigger("add", m, this, t);
                (p || w) && this.trigger("sort", this, t);
                if (o.length || a.length || u.length)
                    t.changes = {
                        added: o,
                        removed: a,
                        merged: u
                    },
                    this.trigger("update", this, t)
            }
            return r ? e[0] : e
        },
        reset: function(e, t) {
            t = t ? n.clone(t) : {};
            for (var r = 0; r < this.models.length; r++)
                this._removeReference(this.models[r], t);
            return t.previousModels = this.models,
            this._reset(),
            e = this.add(e, n.extend({
                silent: !0
            }, t)),
            t.silent || this.trigger("reset", this, t),
            e
        },
        push: function(e, t) {
            return this.add(e, n.extend({
                at: this.length
            }, t))
        },
        pop: function(e) {
            var t = this.at(this.length - 1);
            return this.remove(t, e)
        },
        unshift: function(e, t) {
            return this.add(e, n.extend({
                at: 0
            }, t))
        },
        shift: function(e) {
            var t = this.at(0);
            return this.remove(t, e)
        },
        slice: function() {
            return s.apply(this.models, arguments)
        },
        get: function(e) {
            return e == null ? void 0 : this._byId[e] || this._byId[this.modelId(e.attributes || e)] || e.cid && this._byId[e.cid]
        },
        has: function(e) {
            return this.get(e) != null
        },
        at: function(e) {
            return e < 0 && (e += this.length),
            this.models[e]
        },
        where: function(e, t) {
            return this[t ? "find" : "filter"](e)
        },
        findWhere: function(e) {
            return this.where(e, !0)
        },
        sort: function(e) {
            var t = this.comparator;
            if (!t)
                throw new Error("Cannot sort a set without a comparator");
            e || (e = {});
            var r = t.length;
            return n.isFunction(t) && (t = n.bind(t, this)),
            r === 1 || n.isString(t) ? this.models = this.sortBy(t) : this.models.sort(t),
            e.silent || this.trigger("sort", this, e),
            this
        },
        pluck: function(e) {
            return this.map(e + "")
        },
        fetch: function(e) {
            e = n.extend({
                parse: !0
            }, e);
            var t = e.success
              , r = this;
            return e.success = function(n) {
                var i = e.reset ? "reset" : "set";
                r[i](n, e),
                t && t.call(e.context, r, n, e),
                r.trigger("sync", r, n, e)
            }
            ,
            R(this, e),
            this.sync("read", this, e)
        },
        create: function(e, t) {
            t = t ? n.clone(t) : {};
            var r = t.wait;
            e = this._prepareModel(e, t);
            if (!e)
                return !1;
            r || this.add(e, t);
            var i = this
              , s = t.success;
            return t.success = function(e, t, n) {
                r && i.add(e, n),
                s && s.call(n.context, e, t, n)
            }
            ,
            e.save(null, t),
            e
        },
        parse: function(e, t) {
            return e
        },
        clone: function() {
            return new this.constructor(this.models,{
                model: this.model,
                comparator: this.comparator
            })
        },
        modelId: function(e) {
            return e[this.model.prototype.idAttribute || "id"]
        },
        _reset: function() {
            this.length = 0,
            this.models = [],
            this._byId = {}
        },
        _prepareModel: function(e, t) {
            if (this._isModel(e))
                return e.collection || (e.collection = this),
                e;
            t = t ? n.clone(t) : {},
            t.collection = this;
            var r = new this.model(e,t);
            return r.validationError ? (this.trigger("invalid", this, r.validationError, t),
            !1) : r
        },
        _removeModels: function(e, t) {
            var n = [];
            for (var r = 0; r < e.length; r++) {
                var i = this.get(e[r]);
                if (!i)
                    continue;
                var s = this.indexOf(i);
                this.models.splice(s, 1),
                this.length--,
                delete this._byId[i.cid];
                var o = this.modelId(i.attributes);
                o != null && delete this._byId[o],
                t.silent || (t.index = s,
                i.trigger("remove", i, this, t)),
                n.push(i),
                this._removeReference(i, t)
            }
            return n
        },
        _isModel: function(e) {
            return e instanceof b
        },
        _addReference: function(e, t) {
            this._byId[e.cid] = e;
            var n = this.modelId(e.attributes);
            n != null && (this._byId[n] = e),
            e.on("all", this._onModelEvent, this)
        },
        _removeReference: function(e, t) {
            delete this._byId[e.cid];
            var n = this.modelId(e.attributes);
            n != null && delete this._byId[n],
            this === e.collection && delete e.collection,
            e.off("all", this._onModelEvent, this)
        },
        _onModelEvent: function(e, t, n, r) {
            if (t) {
                if ((e === "add" || e === "remove") && n !== this)
                    return;
                e === "destroy" && this.remove(t, r);
                if (e === "change") {
                    var i = this.modelId(t.previousAttributes())
                      , s = this.modelId(t.attributes);
                    i !== s && (i != null && delete this._byId[i],
                    s != null && (this._byId[s] = t))
                }
            }
            this.trigger.apply(this, arguments)
        }
    });
    var N = {
        forEach: 3,
        each: 3,
        map: 3,
        collect: 3,
        reduce: 0,
        foldl: 0,
        inject: 0,
        reduceRight: 0,
        foldr: 0,
        find: 3,
        detect: 3,
        filter: 3,
        select: 3,
        reject: 3,
        every: 3,
        all: 3,
        some: 3,
        any: 3,
        include: 3,
        includes: 3,
        contains: 3,
        invoke: 0,
        max: 3,
        min: 3,
        toArray: 1,
        size: 1,
        first: 3,
        head: 3,
        take: 3,
        initial: 3,
        rest: 3,
        tail: 3,
        drop: 3,
        last: 3,
        without: 0,
        difference: 0,
        indexOf: 3,
        shuffle: 1,
        lastIndexOf: 3,
        isEmpty: 1,
        chain: 1,
        sample: 3,
        partition: 3,
        groupBy: 3,
        countBy: 3,
        sortBy: 3,
        indexBy: 3,
        findIndex: 3,
        findLastIndex: 3
    };
    u(E, N, "models");
    var C = t.View = function(e) {
        this.cid = n.uniqueId("view"),
        n.extend(this, n.pick(e, L)),
        this._ensureElement(),
        this.initialize.apply(this, arguments)
    }
      , k = /^(\S+)\s*(.*)$/
      , L = ["model", "collection", "el", "id", "attributes", "className", "tagName", "events"];
    n.extend(C.prototype, l, {
        tagName: "div",
        $: function(e) {
            return this.$el.find(e)
        },
        initialize: function() {},
        render: function() {
            return this
        },
        remove: function() {
            return this._removeElement(),
            this.stopListening(),
            this
        },
        _removeElement: function() {
            this.$el.remove()
        },
        setElement: function(e) {
            return this.undelegateEvents(),
            this._setElement(e),
            this.delegateEvents(),
            this
        },
        _setElement: function(e) {
            this.$el = e instanceof t.$ ? e : t.$(e),
            this.el = this.$el[0]
        },
        delegateEvents: function(e) {
            e || (e = n.result(this, "events"));
            if (!e)
                return this;
            this.undelegateEvents();
            for (var t in e) {
                var r = e[t];
                n.isFunction(r) || (r = this[r]);
                if (!r)
                    continue;
                var i = t.match(k);
                this.delegate(i[1], i[2], n.bind(r, this))
            }
            return this
        },
        delegate: function(e, t, n) {
            return this.$el.on(e + ".delegateEvents" + this.cid, t, n),
            this
        },
        undelegateEvents: function() {
            return this.$el && this.$el.off(".delegateEvents" + this.cid),
            this
        },
        undelegate: function(e, t, n) {
            return this.$el.off(e + ".delegateEvents" + this.cid, t, n),
            this
        },
        _createElement: function(e) {
            return document.createElement(e)
        },
        _ensureElement: function() {
            if (!this.el) {
                var e = n.extend({}, n.result(this, "attributes"));
                this.id && (e.id = n.result(this, "id")),
                this.className && (e["class"] = n.result(this, "className")),
                this.setElement(this._createElement(n.result(this, "tagName"))),
                this._setAttributes(e)
            } else
                this.setElement(n.result(this, "el"))
        },
        _setAttributes: function(e) {
            this.$el.attr(e)
        }
    }),
    t.sync = function(e, r, i) {
        var s = A[e];
        n.defaults(i || (i = {}), {
            emulateHTTP: t.emulateHTTP,
            emulateJSON: t.emulateJSON
        });
        var o = {
            type: s,
            dataType: "json"
        };
        i.url || (o.url = n.result(r, "url") || q()),
        i.data == null && r && (e === "create" || e === "update" || e === "patch") && (o.contentType = "application/json",
        o.data = JSON.stringify(i.attrs || r.toJSON(i))),
        i.emulateJSON && (o.contentType = "application/x-www-form-urlencoded",
        o.data = o.data ? {
            model: o.data
        } : {});
        if (i.emulateHTTP && (s === "PUT" || s === "DELETE" || s === "PATCH")) {
            o.type = "POST",
            i.emulateJSON && (o.data._method = s);
            var u = i.beforeSend;
            i.beforeSend = function(e) {
                e.setRequestHeader("X-HTTP-Method-Override", s);
                if (u)
                    return u.apply(this, arguments)
            }
        }
        o.type !== "GET" && !i.emulateJSON && (o.processData = !1);
        var a = i.error;
        i.error = function(e, t, n) {
            i.textStatus = t,
            i.errorThrown = n,
            a && a.call(i.context, e, t, n)
        }
        ;
        var f = i.xhr = t.ajax(n.extend(o, i));
        return r.trigger("request", r, f, i),
        f
    }
    ;
    var A = {
        create: "POST",
        update: "PUT",
        patch: "PATCH",
        "delete": "DELETE",
        read: "GET"
    };
    t.ajax = function() {
        return t.$.ajax.apply(t.$, arguments)
    }
    ;
    var O = t.Router = function(e) {
        e || (e = {}),
        e.routes && (this.routes = e.routes),
        this._bindRoutes(),
        this.initialize.apply(this, arguments)
    }
      , M = /\((.*?)\)/g
      , _ = /(\(\?)?:\w+/g
      , D = /\*\w+/g
      , P = /[\-{}\[\]+?.,\\\^$|#\s]/g;
    n.extend(O.prototype, l, {
        initialize: function() {},
        route: function(e, r, i) {
            n.isRegExp(e) || (e = this._routeToRegExp(e)),
            n.isFunction(r) && (i = r,
            r = ""),
            i || (i = this[r]);
            var s = this;
            return t.history.route(e, function(n) {
                var o = s._extractParameters(e, n);
                s.execute(i, o, r) !== !1 && (s.trigger.apply(s, ["route:" + r].concat(o)),
                s.trigger("route", r, o),
                t.history.trigger("route", s, r, o))
            }),
            this
        },
        execute: function(e, t, n) {
            e && e.apply(this, t)
        },
        navigate: function(e, n) {
            return t.history.navigate(e, n),
            this
        },
        _bindRoutes: function() {
            if (!this.routes)
                return;
            this.routes = n.result(this, "routes");
            var e, t = n.keys(this.routes);
            while ((e = t.pop()) != null)
                this.route(e, this.routes[e])
        },
        _routeToRegExp: function(e) {
            return e = e.replace(P, "\\$&").replace(M, "(?:$1)?").replace(_, function(e, t) {
                return t ? e : "([^/?]+)"
            }).replace(D, "([^?]*?)"),
            new RegExp("^" + e + "(?:\\?([\\s\\S]*))?$")
        },
        _extractParameters: function(e, t) {
            var r = e.exec(t).slice(1);
            return n.map(r, function(e, t) {
                return t === r.length - 1 ? e || null : e ? decodeURIComponent(e) : null
            })
        }
    });
    var H = t.History = function() {
        this.handlers = [],
        this.checkUrl = n.bind(this.checkUrl, this),
        typeof window != "undefined" && (this.location = window.location,
        this.history = window.history)
    }
      , B = /^[#\/]|\s+$/g
      , j = /^\/+|\/+$/g
      , F = /#.*$/;
    H.started = !1,
    n.extend(H.prototype, l, {
        interval: 50,
        atRoot: function() {
            var e = this.location.pathname.replace(/[^\/]$/, "$&/");
            return e === this.root && !this.getSearch()
        },
        matchRoot: function() {
            var e = this.decodeFragment(this.location.pathname)
              , t = e.slice(0, this.root.length - 1) + "/";
            return t === this.root
        },
        decodeFragment: function(e) {
            return decodeURI(e.replace(/%25/g, "%2525"))
        },
        getSearch: function() {
            var e = this.location.href.replace(/#.*/, "").match(/\?.+/);
            return e ? e[0] : ""
        },
        getHash: function(e) {
            var t = (e || this).location.href.match(/#(.*)$/);
            return t ? t[1] : ""
        },
        getPath: function() {
            var e = this.decodeFragment(this.location.pathname + this.getSearch()).slice(this.root.length - 1);
            return e.charAt(0) === "/" ? e.slice(1) : e
        },
        getFragment: function(e) {
            return e == null && (this._usePushState || !this._wantsHashChange ? e = this.getPath() : e = this.getHash()),
            e.replace(B, "")
        },
        start: function(e) {
            if (H.started)
                throw new Error("Backbone.history has already been started");
            H.started = !0,
            this.options = n.extend({
                root: "/"
            }, this.options, e),
            this.root = this.options.root,
            this._wantsHashChange = this.options.hashChange !== !1,
            this._hasHashChange = "onhashchange"in window && (document.documentMode === void 0 || document.documentMode > 7),
            this._useHashChange = this._wantsHashChange && this._hasHashChange,
            this._wantsPushState = !!this.options.pushState,
            this._hasPushState = !!this.history && !!this.history.pushState,
            this._usePushState = this._wantsPushState && this._hasPushState,
            this.fragment = this.getFragment(),
            this.root = ("/" + this.root + "/").replace(j, "/");
            if (this._wantsHashChange && this._wantsPushState) {
                if (!this._hasPushState && !this.atRoot()) {
                    var t = this.root.slice(0, -1) || "/";
                    return this.location.replace(t + "#" + this.getPath()),
                    !0
                }
                this._hasPushState && this.atRoot() && this.navigate(this.getHash(), {
                    replace: !0
                })
            }
            if (!this._hasHashChange && this._wantsHashChange && !this._usePushState) {
                this.iframe = document.createElement("iframe"),
                this.iframe.src = "javascript:0",
                this.iframe.style.display = "none",
                this.iframe.tabIndex = -1;
                var r = document.body
                  , i = r.insertBefore(this.iframe, r.firstChild).contentWindow;
                i.document.open(),
                i.document.close(),
                i.location.hash = "#" + this.fragment
            }
            var s = window.addEventListener || function(e, t) {
                return attachEvent("on" + e, t)
            }
            ;
            this._usePushState ? s("popstate", this.checkUrl, !1) : this._useHashChange && !this.iframe ? s("hashchange", this.checkUrl, !1) : this._wantsHashChange && (this._checkUrlInterval = setInterval(this.checkUrl, this.interval));
            if (!this.options.silent)
                return this.loadUrl()
        },
        stop: function() {
            var e = window.removeEventListener || function(e, t) {
                return detachEvent("on" + e, t)
            }
            ;
            this._usePushState ? e("popstate", this.checkUrl, !1) : this._useHashChange && !this.iframe && e("hashchange", this.checkUrl, !1),
            this.iframe && (document.body.removeChild(this.iframe),
            this.iframe = null),
            this._checkUrlInterval && clearInterval(this._checkUrlInterval),
            H.started = !1
        },
        route: function(e, t) {
            this.handlers.unshift({
                route: e,
                callback: t
            })
        },
        checkUrl: function(e) {
            var t = this.getFragment();
            t === this.fragment && this.iframe && (t = this.getHash(this.iframe.contentWindow));
            if (t === this.fragment)
                return !1;
            this.iframe && this.navigate(t),
            this.loadUrl()
        },
        loadUrl: function(e) {
            return this.matchRoot() ? (e = this.fragment = this.getFragment(e),
            n.some(this.handlers, function(t) {
                if (t.route.test(e))
                    return t.callback(e),
                    !0
            })) : !1
        },
        navigate: function(e, t) {
            if (!H.started)
                return !1;
            if (!t || t === !0)
                t = {
                    trigger: !!t
                };
            e = this.getFragment(e || "");
            var n = this.root;
            if (e === "" || e.charAt(0) === "?")
                n = n.slice(0, -1) || "/";
            var r = n + e;
            e = this.decodeFragment(e.replace(F, ""));
            if (this.fragment === e)
                return;
            this.fragment = e;
            if (this._usePushState)
                this.history[t.replace ? "replaceState" : "pushState"]({}, document.title, r);
            else {
                if (!this._wantsHashChange)
                    return this.location.assign(r);
                this._updateHash(this.location, e, t.replace);
                if (this.iframe && e !== this.getHash(this.iframe.contentWindow)) {
                    var i = this.iframe.contentWindow;
                    t.replace || (i.document.open(),
                    i.document.close()),
                    this._updateHash(i.location, e, t.replace)
                }
            }
            if (t.trigger)
                return this.loadUrl(e)
        },
        _updateHash: function(e, t, n) {
            if (n) {
                var r = e.href.replace(/(javascript:|#).*$/, "");
                e.replace(r + "#" + t)
            } else
                e.hash = "#" + t
        }
    }),
    t.history = new H;
    var I = function(e, t) {
        var r = this, i;
        return e && n.has(e, "constructor") ? i = e.constructor : i = function() {
            return r.apply(this, arguments)
        }
        ,
        n.extend(i, r, t),
        i.prototype = n.create(r.prototype, e),
        i.prototype.constructor = i,
        i.__super__ = r.prototype,
        i
    };
    b.extend = E.extend = O.extend = C.extend = H.extend = I;
    var q = function() {
        throw new Error('A "url" property or function must be specified')
    }
      , R = function(e, t) {
        var n = t.error;
        t.error = function(r) {
            n && n.call(t.context, e, r, t),
            e.trigger("error", e, r, t)
        }
    };
    return t
});

$JE = function() {}
;
function replaceHTML(e, t) {
    if (!e || !e.nodeName)
        return;
    var n = document.createElement(e.nodeName);
    return e.id && (n.id = e.id),
    e.className && (n.className = e.className),
    n.innerHTML = t || "",
    e.parentNode.replaceChild(n, e),
    n
}
function replaceWhiteSpace(e) {
    return typeof e == "string" ? e.replace(/\s{2}/g, "&nbsp;&nbsp;") : ""
}
function restoreWhiteSpace(e) {
    return typeof e == "string" ? e.replace(/\&nbsp\;/g, " ") : ""
}
function replaceDollarSign(e) {
    return typeof e == "string" ? e.replace(/\$/g, "&#36;") : ""
}
function replaceSpecialChar(e) {
    return typeof e == "string" ? e.replace(/\&/g, "&amp;").replace(/\"/g, "&quot;").replace(/\'/g, "&#39;").replace(/</g, "&lt;").replace(/\>/g, "&gt;") : ""
}
function restoreSpecialChar(e) {
    return typeof e == "string" ? e.replace(/&amp;/g, "&").replace(/&quot;/g, '"').replace(/&#39;/g, "'").replace(/&lt;/g, "<").replace(/&gt;/g, ">") : ""
}
function restoreAllSpecialChar(e) {
    var t = document.createElement("div");
    t.innerHTML = e;
    try {
        return t.textContent || t.innerText
    } finally {
        t = null
    }
}
function stripScripts(e) {
    return typeof e == "string" ? e.replace(/<script[^>]*>([\S\s]*?)<\/script>/img, "") : ""
}
function extractScripts(e) {
    return typeof e == "string" ? e.match(/<script[^>]*>([\S\s]*?)<\/script>/img) || [] : []
}
function evaluateScripts(sString) {
    var arr = extractScripts(sString)
      , i = 0
      , nLen = arr.length;
    while (i < nLen)
        eval(arr[i].replace(/<(\/)?script[^>]*>/img, "")),
        i++
}
function stripHTML(e) {
    return typeof e == "string" ? e.replace(/<(?:.|\s)*?>/g, "") : ""
}
function addStrongTag(e, t) {
    !!t && t.nodeName && (t.innerHTML = t.innerHTML.replace(/<\/?strong>/gi, ""));
    if (e) {
        var n = e.innerHTML.replace(/<\/?strong>/gi, "");
        e.innerHTML = "<strong>" + n + "</strong>"
    }
}
function addSelectboxOption(e, t, n, r) {
    var i = new Option(t,n,r || !1);
    e.options[e.options.length] = i,
    i = null
}
function removeSelectboxOption(e, t) {
    t ? e.options[t] = null : e.options.length = 0
}
function cutString(e, t, n) {
    var r = typeof e != "String" ? e.toString() : e
      , i = parseInt(t, 10)
      , s = n || "";
    return r.length > i ? r.substring(0, i) + s : r
}
function cutStringByByte(e, t, n) {
    var r = typeof e != "String" ? e.toString() : e
      , i = parseInt(t, 10)
      , s = n || "";
    for (var o = 0, u = r.length, a = 0; o < u; o++) {
        a += r.charCodeAt(o) > 128 ? 2 : 1;
        if (a > i)
            return r.substring(0, o) + s
    }
    return r
}
function cutStringByPixel(e, t, n) {
    var r = typeof e != "String" ? e.toString() : e
      , i = parseInt(t, 10)
      , s = n || ""
      , o = []
      , u = "";
    this.welMeasure ? this.welMeasure.empty() : (this.welMeasure = $Element("<span>"),
    this.welMeasure.css({
        position: "absolute",
        top: "-1000px",
        left: "-1000px"
    }),
    this.welMeasure.prependTo(document.body)),
    r = r.replace(/\r?\n/gim, " ");
    for (var a = 0, f = r.length; a < f; a++) {
        u = r.charAt(a),
        u === " " ? o.push(";") : o.push(u),
        this.welMeasure.text(o.join("") + s);
        if (this.welMeasure.width() > i)
            return r.substring(0, o.length - 1) + s
    }
    return r
}
function getConstructorName(e) {
    if (e && e.constructor) {
        var t = e.constructor.toString()
          , n = t.match(/function ([^\(]*)/);
        return n && n[1] || null
    }
    return null
}
function cloneObject(oObject) {
    var sConstructor, oDestinationTarget;
    if (oObject && typeof oObject == "object" && (sConstructor = getConstructorName(oObject))) {
        oDestinationTarget = eval("new " + sConstructor + "()");
        for (var key in oObject)
            oDestinationTarget[key] = arguments.callee(oObject[key])
    } else
        oDestinationTarget = oObject;
    return oDestinationTarget
}
function isArray(e) {
    return Object.prototype.toString.call(e) == "[object Array]"
}
function isEqualObject(e, t) {
    if (!e || !t)
        return !1;
    for (var n in e)
        if (e[n]instanceof Object) {
            if (!this.isEqualObject(e[n], t[n]))
                return !1
        } else if (e[n] != t[n])
            return !1;
    return !0
}
function makeTemplate(e, t) {
    return e.replace(/{([^{}]*)}/g, function(e, n) {
        var r = t[n] || "";
        return r
    })
}
function changeJavascriptDate(e) {
    var t = null
      , n = e.match(/^([0-9]{4,})-([01][0-9])-([0-3][0-9]) ([0-2][0-9]):([0-5][0-9]):([0-5][0-9])/);
    return n === null ? (n = e.match(/^([0-9]{4,})-([01][0-9])-([0-3][0-9])/),
    n !== null && (t = new Date(n[1],Number(n[2]) - 1,n[3]))) : t = new Date(n[1],Number(n[2]) - 1,n[3],n[4],n[5],n[6]),
    t
}
function convertDateToJsNormalDate(e) {
    return e ? e.substr(0, 4) + "-" + e.substr(4, 2) + "-" + e.substr(6, 2) : e
}
function changeDateFormat(e, t) {
    if (arguments.length < 1)
        return !1;
    if (e.constructor != Date && e.constructor != Date())
        return !1;
    var n = {
        format: "{yyyy}/{mm}/{0d} {0H}:{0i}",
        monthFormat: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
        weekFormat: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
        ampmFormat: ["am", "pm"]
    };
    t = t || {};
    for (var r in t)
        n[r] = t[r];
    return n.rowData = [e.getFullYear() + "", e.getMonth(), e.getDate(), e.getDay(), e.getHours() < 12 ? 0 : 1, e.getHours(), e.getMinutes(), e.getSeconds()],
    n.rowData[3] === 0 && (n.rowData[3] = 7),
    n.format.replace(/\{([^{}]*)\}/g, function(e) {
        function r(e) {
            return e >= 10 ? e : "0" + e
        }
        function i(e) {
            return e > 12 ? e - 12 : e
        }
        var t = n
          , s = t.rowData
          , o = t.monthFormat
          , u = t.weekFormat
          , a = t.ampmFormat;
        return e == "{yyyy}" && s[0] || e == "{yy}" && s[0].slice(2, 4) || e == "{mm}" && o[s[1]] || e == "{dd}" && s[2] || e == "{0d}" && r(s[2]) || e == "{ww}" && u[s[3] - 1] || e == "{ap}" && a[s[4]] || e == "{hh}" && i(s[5]) || e == "{HH}" && s[5] || e == "{0h}" && r(i(s[5])) || e == "{0H}" && r(s[5]) || e == "{ii}" && r(s[6]) || e == "{0i}" && r(s[6]) || e == "{ss}" && s[7] || e == "{0s}" && r(s[7]) || "'" + e + ":undefined type'"
    })
}
function isNumberOnly(e) {
    return /^[\d]+$/.test(e) ? !0 : !1
}
function isEmpty(e) {
    return e && e.length > 0 ? !1 : !0
}
function isNotEmpty(e) {
    return !isEmpty(e)
}
function trim(e) {
    return e ? typeof e == "string" ? e.replace(/^\s+/g, "").replace(/\s+$/g, "") : "" : e
}
function isEmail(e) {
    var t = typeof e == "string" ? trim(e) : ""
      , n = t.match(/[-!#$%&'*+\/^_~{}|0-9a-zA-Z]+(\.[-!#$%&'*+\/^_~{}|0-9a-zA-Z]+)*@[-!#$%&'*+\/^_~{}|0-9a-zA-Z]+(\.[-!#$%&'*+\/^_~{}|0-9a-zA-Z]+)+/);
    return n && n[0] == t ? !0 : !1
}
function isEmailFirst(e) {
    var t = /^[\w\d]+([-_\.]?[\w\d])*$/i;
    return e && t.test(e) ? !0 : !1
}
function isEmailLast(e) {
    var t = /^[\w\d]([-_\.]?[\w\d])*\.[\w]{2,3}$/i;
    return e && t.test(e) ? !0 : !1
}
function isPhone(e) {
    var t = /^0\d{1,2}-[1-9]\d{2,3}-\d{4}$/;
    return e && t.test(e) ? !0 : !1
}
function isIP(e) {
    var t = /^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4]\d|[01]?\d\d|\d)\.(25[0-5]|2[0-4]\d|[01]?\d\d|\d)\.(25[0-5]|2[0-4]\d|[01]?\d\d|\d)$/;
    return e && t.test(e) ? !0 : !1
}
function isURL(e) {
    var t = /^(http|https|ftp|mailto|mms):(?:\/\/)?((\w|-)+(?:[\.:@](\w|-))+)(?:\/|@)?([^"\?]*?)(?:\?([^\?"]*?))?$/;
    return e && t.test(e) ? !0 : !1
}
function replaceAll(e, t, n) {
    return typeof e == "string" ? e.replace(new RegExp(t,"g"), n) : ""
}
function removeNewline(e) {
    return typeof e == "string" ? e.replace(/\r/gi, "").replace(/\n/gi, "") : ""
}
function replaceNewline(e) {
    return typeof e == "string" ? e.replace(/<br\s?\/?>/gi, "\n").replace(/<\/?p>/gi, "\n") : ""
}
function getCharByte(e) {
    if (!e)
        return 0;
    var t = 0
      , n = escape(e);
    return n.length == 1 ? t++ : n.indexOf("%u") != -1 ? t += 2 : n.indexOf("%") != -1 && (t += n.length / 3),
    t
}
function getStringByte(e) {
    var t = typeof e == "string" ? e : ""
      , n = 0
      , r = ""
      , s = t.length;
    for (i = 0; i < s; i++)
        r = t.charAt(i),
        n += getCharByte(r);
    return n
}
function cutFilenameByByte(e, t, n) {
    var r = e || ""
      , i = n || ""
      , s = parseInt(t, 10);
    if (s < 1 || s >= getStringByte(r))
        return r;
    var o = r.split(".")
      , u = o.length
      , a = ""
      , f = 0;
    u > 1 && (a = o[u - 1],
    f = getStringByte(a),
    o.pop(),
    r = o.join("."));
    var l = 0;
    i != "" && (l = getStringByte(i));
    var c = l + f;
    s > c ? s -= c : r = "";
    for (var h = 0, p = 0, d = r.length; h < d; h++) {
        p += getCharByte(r.charAt(h));
        if (p > s) {
            r = r.substring(0, h);
            break
        }
    }
    return r + i + a
}
function makeRandomString(e, t) {
    var n = e || 0
      , r = t || "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz"
      , i = "";
    for (var s = 0; s < n; s++) {
        var o = Math.floor(Math.random() * r.length);
        i += r.substring(o, o + 1)
    }
    return i
}
function getFileSize(e) {
    var t = e || 0
      , n = ""
      , r = ""
      , i = 0
      , s = ["KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"]
      , o = s.length;
    if (t === 0)
        return t + s[0];
    while (o >= 0) {
        i = t / Math.pow(1024, o);
        if (Math.floor(i) > 0) {
            o === 0 ? (i = 1,
            r = s[o]) : r = s[o - 1];
            break
        }
        o--
    }
    if (r == "KB")
        n = Math.ceil(i) + r;
    else {
        var u = String(i).match(/((\d*)\.(\d{0,2}))(\d)?/i);
        if (!u[4] || Number(u[4]) === 0)
            Number(u[3]) === 0 ? n = String(u[2]) + r : n = String(u[1]) + r;
        else {
            var a = Math.round(Number(u[1]) * 100 + 1) / 100;
            n = String(a) + r
        }
    }
    return n
}
function changeNumberFormat(e) {
    var t = ""
      , n = e || 0;
    n = typeof n != "String" ? String(n) : n;
    if (n.indexOf(".") > -1) {
        var r = n.split(".");
        n = r[0],
        t = "." + r[1]
    }
    return n.replace(/(\d)(?=(\d{3})+$)/igm, "$1,") + t
}
function getFolderName(e) {
    return typeof e == "string" ? e.match(/.*\/(.[^\/]*)\/?$/i)[1] : ""
}
function isUpperPath(e, t) {
    var n = !1
      , r = $S(e).escapeRegex().$value()
      , i = new RegExp("^" + r,"i")
      , s = i.exec(t);
    return s && (n = !0),
    n
}
function getParentPath(e) {
    var t = e.replace(/([^\/]*\/?)$/i, "");
    return /^(\w*:\/{2,3})$/.test(t) && (t = ""),
    t
}
function sortArray(e, t, n) {
    var r, i = e.length, s, o;
    if (i / 2 < 1)
        r = e;
    else if (i / 2 == 1) {
        var u;
        s = n ? e[0][n] : e[0],
        o = n ? e[1][n] : e[1],
        t == "asc" ? s > o && (u = e[1],
        e[1] = e[0],
        e[0] = u) : s < o && (u = e[1],
        e[1] = e[0],
        e[0] = u),
        r = [e[0], e[1]]
    } else {
        var a = Math.round(i / 2) - 1
          , f = 0
          , l = 0
          , c = []
          , h = [];
        if (t == "asc") {
            for (var p = 0; p < a; p++)
                s = n ? e[p][n] : e[p],
                o = n ? e[a][n] : e[a],
                s > o ? h[l++] = e[p] : c[f++] = e[p];
            for (var d = a + 1; d < i; d++)
                s = n ? e[d][n] : e[d],
                o = n ? e[a][n] : e[a],
                s < o ? c[f++] = e[d] : h[l++] = e[d]
        } else {
            for (var p = 0; p < a; p++)
                s = n ? e[p][n] : e[p],
                o = n ? e[a][n] : e[a],
                s < o ? h[l++] = e[p] : c[f++] = e[p];
            for (var d = a + 1; d < i; d++)
                s = n ? e[d][n] : e[d],
                o = n ? e[a][n] : e[a],
                s > o ? c[f++] = e[d] : h[l++] = e[d]
        }
        var v = c.length, m = h.length, g, y;
        v > 1 ? g = arguments.callee(c, t, n) : g = c,
        m > 1 ? y = arguments.callee(h, t, n) : y = h,
        r = new Array(v + m - 1);
        var b = 0;
        for (var p = 0, w = g.length; p < w; p++)
            r[b++] = g[p];
        r[b++] = e[a];
        for (var p = 0, E = y.length; p < E; p++)
            r[b++] = y[p]
    }
    return r
}
function getCookie(e) {
    var t = document.cookie.split(/\s*;\s*/)
      , n = new RegExp("^(\\s*" + e + "\\s*=)");
    for (var r = 0; r < t.length; r++)
        if (n.test(t[r]))
            return unescape(t[r].substr(RegExp.$1.length));
    return null
}
function setCookie(e, t, n, r, i) {
    var s = "";
    typeof n == "number" && (s = ";expires=" + (new Date((new Date).getTime() + n * 1e3 * 60 * 60 * 24)).toGMTString()),
    typeof r == "undefined" && (r = ""),
    typeof i == "undefined" && (i = "/"),
    document.cookie = e + "=" + escape(t) + s + "; path=" + i + (r ? "; domain=" + r : "")
}
function extend(e, t) {
    for (var n in t)
        typeof e[n] == "undefined" && (e[n] = t[n]);
    return e
}
function bind(e, t) {
    var n = e;
    return function() {
        return t.apply(n, arguments)
    }
}
function disableSelection(e) {
    var t = $Agent().navigator();
    t.ie || t.opera ? e.unselectable = "on" : t.safari || t.chrome ? e.style.KhtmlUserSelect = "none" : e.style.MozUserSelect = "-moz-none"
}
function setLayerAttrs(e, t) {
    for (var n in t)
        typeof t[n] != "object" ? e[n] = t[n] : arguments.callee(e[n], t[n]);
    return e
}
function pad(e, t, n) {
    var r = n || " "
      , i = e + "";
    if (i.length < t) {
        var s = new Array(t - i.length + 1);
        s[s.length - 1] = i,
        i = s.join(r)
    }
    return i
}
function getCSSRule(e) {
    var t = function(e) {
        var t = document.styleSheets;
        for (var n = t.length - 1; n >= 0; n--)
            try {
                var r = t[n]
                  , i = r.cssRules || r.rules;
                for (var s = i.length - 1; s >= 0; s--) {
                    var o = i[s];
                    if (o.selectorText.toLowerCase() == e.toLowerCase())
                        return o.style || null
                }
            } catch (u) {}
        return null
    }
      , n = t(e);
    if (n)
        return n;
    var r = document.createElement("style");
    return r.type = "text/css",
    r.styleSheet ? r.styleSheet.cssText = e + "{}" : r.appendChild(document.createTextNode(e + "{}")),
    document.getElementsByTagName("head")[0].appendChild(r),
    t(e)
}
function arrangeCenter(e, t) {
    var n = e
      , r = t || n.parentNode
      , i = [r.offsetWidth, r.offsetHeight]
      , s = [n.offsetWidth, n.offsetHeight];
    n.style.left = (i[0] - s[0]) / 2 + "px",
    n.style.top = (i[1] - s[1]) / 2 + "px"
}
function setImageOn(e, t) {
    var n = e.src;
    n = n.replace(/(\w+)(\.\w+)(\?.*)?$/, function(e, n, r, i) {
        return n = n.replace(/_on$/, ""),
        t && (n += "_on"),
        n + r + (i || "")
    }),
    e.src = n
}
function isImageOn(e) {
    var t = /(\w+)_on(\.\w+)(\?.*)?$/;
    return t.test(e.src)
}
function avoidFlashHashBug() {
    var e = document.title;
    window.setTimeout(function() {
        document.title = e
    }, 0)
}
function openPopup(e, t, n, r, i) {
    var s = ""
      , o = i || !1;
    return o && (nLeftPosition = (screen.availWidth - n) / 2,
    nTopPosition = (screen.availHeight - r) / 2,
    s = "left=" + nLeftPosition + ", top=" + nTopPosition + ","),
    window.open(e, t, s + " toolbar=no, location=no, status=no, menubars=no, resizable=no, width=" + n + ", height=" + r)
}
function getDomain(e) {
    var t = e || window.location.toString()
      , n = t.match(/^(http|https|mms):\/\/([^\/]*)/i);
    return n ? n[0] : ""
}
function getSimpleURL(e) {
    var t = e || window.location.toString();
    return t.indexOf("?") > -1 && (t = t.split("?")[0]),
    t.indexOf("#") > -1 && (t = t.split("#")[0]),
    t
}
function getURLParameter(e) {
    var t = e || window.location.toString()
      , n = "";
    return t.indexOf("?") > -1 && (n = t.split("?")[1],
    n.indexOf("#") > -1 && (n = n.split("#")[0])),
    n
}
function getURLHash(e) {
    var t = e || window.location.toString()
      , n = "";
    return t.indexOf("#") > -1 && (n = t.split("#")[1]),
    n
}
function changeQueryStringToObject(e) {
    var t = {}
      , n = []
      , r = e || "";
    r.indexOf("&") > -1 ? n = r.split("&") : n[0] = r;
    for (var i = 0, s = n.length; i < s; i++)
        if (n[i].indexOf("=") > -1) {
            var o = n[i].split("=");
            t[o[0]] = o[1]
        }
    return t
}
function changeObjectToQueryString(e) {
    var t = [];
    for (var n in e)
        t.push(n + "=" + e[n]);
    return t.join("&")
}
function stopFlicker() {
    var e = document.uniqueID && document.compatMode && !window.XMLHttpRequest && document.execCommand;
    try {
        !e || e("BackgroundImageCache", !1, !0)
    } catch (t) {}
}
function contains(e, t) {
    if (typeof e.contains != "undefined" && t["nodeType"] == 1)
        return e == t || e.contains(t);
    if (typeof e.compareDocumentPosition != "undefined")
        return e == t || Boolean(e.compareDocumentPosition(t) & 16);
    while (t && e != t)
        t = t.parentNode;
    return t == e
}
function repeat(e, t, n, r) {
    function i(n) {
        n >= 0 && (e.call(this),
        window.globalRepeatTimer = setTimeout(function() {
            i(--n)
        }, t))
    }
    n = n || 0,
    t = t || 1e3,
    r ? i(--n) : setTimeout(function() {
        i(--n)
    }, t)
}
function stopRepeat() {
    window.globalRepeatTimer && window.clearTimeout(window.globalRepeatTimer)
}
;Calendar = eg.Class.extend(eg.Component, {
    construct: function(e) {
        this._initVars(e),
        this._initComponents(),
        this._setEventHandler()
    },
    _initVars: function(e) {
        this._superCategory = e.superCategory,
        this._category = e.category,
        this._categoryName = e.categoryName,
        this._clickCodeArea = e.clickCodeArea,
        this._$calendar = $("#_calendar"),
        this._$calendar_frame = $("#_calendar_frame"),
        this._$dimmed_layer = $("#_dimmed_layer3"),
        this._calendar_tpl = Handlebars.compile($("#_calendar_tpl").html())
    },
    _initComponents: function() {},
    _setEventHandler: function() {
        this._$calendar_frame.on("click", "a,button", $.proxy(function(e) {
            e.preventDefault();
            var t = $(e.currentTarget);
            t.hasClass("btn_close") ? this.close() : this._triggerToUpdateCalendar(t)
        }, this)),
        this._$calendar_frame.on("change", "#_select_year", $.proxy(function(e) {
            var t = $(e.currentTarget).find("option:selected");
            this._triggerToUpdateCalendar(t)
        }, this))
    },
    _triggerToUpdateCalendar: function(e) {
        var t = e.data("type")
          , n = e.data("date");
        this.trigger("update", {
            buttonType: t,
            date: n
        }),
        t == "year" || t == "month" ? this._currentCalendarFrameHtml || (this._currentCalendarFrameHtml = this._$calendar_frame.html()) : this._currentCalendarFrameHtml = ""
    },
    _processData: function(e, t) {
        e.currentYear = e.currentDate.substr(0, 4),
        e.currentMonth = e.currentDate.substr(4, 2).replace(/^[0]+/g, "");
        var n = []
          , r = [];
        for (var i = 0; i < e.calendarList.length; i++) {
            var s = e.calendarList[i];
            s.dd = s.ymd.substr(6, 2).replace(/^[0]+/g, ""),
            s.ymd == t ? s.css = "is_selected" : s.ymd < e.startYmd || s.ymd > e.endYmd ? s.css = "is_disable" : s.gameExist == 0 ? s.css = "is_disable" : s.css = "",
            s.ymd == e.today && (s.css += " today",
            s.isToday = !0),
            s.homeTeamCode || s.awayTeamCode ? s.hasTeamInfo = !0 : s.gameCount > 0 && (s.hasGameInfo = !0),
            r.push(s),
            r.length % 7 === 0 && (n.push(r),
            r = [])
        }
        e.weeks = n
    },
    _processYearData: function(e) {
        var t = e.currentDate.substr(0, 4)
          , n = _.some(e.yearList, function(e) {
            return e.year === t * 1
        });
        n === !1 && (e.yearList[e.yearList.length] = {
            year: t * 1
        });
        for (var r = 0; r < e.yearList.length; r++) {
            var i = e.yearList[r];
            i.gameDate = i.year + e.currentDate.substr(4, 6),
            t == i.year * 1 && (i.isSelected = !0)
        }
        e.yearList = _.sortBy(e.yearList, "year")
    },
    _drawBody: function(e) {
        e.isBaseball = this._superCategory == "baseball",
        e.category = this._category,
        e.leagueName = this._categoryName && this._categoryName.replace("리그", ""),
        $("#_calendar_frame").html(this._calendar_tpl(e))
    },
    draw: function(e) {
        var t = $("._current_date").data("date");
        e.clickCodeArea = this._clickCodeArea,
        this._processData(e, t),
        this._processYearData(e),
        this._drawBody(e)
    },
    open: function() {
        this._currentCalendarFrameHtml && this._$calendar_frame.html(this._currentCalendarFrameHtml),
        this._$calendar.show(),
        this._$dimmed_layer.addClass("on"),
        $(document.body).addClass("body_noscroll"),
        $("#calendarMonthScroll").length && this._createMonthListScroll()
    },
    close: function() {
        this._$calendar.hide(),
        this._$dimmed_layer.removeClass("on"),
        $(document.body).removeClass("body_noscroll")
    },
    toggle: function() {
        this.isOpen() ? this.close() : this.open()
    },
    isOpen: function() {
        return !!this._$calendar.visible()
    }
});
function defineMobileUtil() {
    typeof window != "undefined" && typeof window.m == "undefined" && (window.m = {}),
    typeof window != "undefined" && typeof window.m.util == "undefined" && (window.m.util = {},
    typeof window.m.util.getDeviceInfo == "undefined") && (window.m.util.getDeviceInfo = function() {
        var e = {}
          , t = navigator.userAgent;
        e.getName = function() {
            var t = "";
            for (x in e)
                typeof e[x] == "boolean" && e[x] && e.hasOwnProperty(x) && (t = x);
            return t
        }
        ,
        e.iphone = (t || "").indexOf("iPhone") > -1,
        e.ipad = (t || "").indexOf("iPad") > -1,
        e.mobile = (t || "").indexOf("Mobile") > -1,
        e.samsungPhone = (t || "").indexOf("SAMSUNG") > -1,
        e.lgPhone = (t || "").indexOf("LG-") > -1,
        e.chrome = (t || "").indexOf("Chrome") > -1,
        e.android = (t || "").indexOf("Android") > -1,
        e.galaxyS4 = (t || "").indexOf("SHV-E300") > -1,
        e.galaxyTab = (t || "").indexOf("SHW-M180S") > -1,
        e.galaxyTab101 = (t || "").indexOf("SHW-M380") > -1,
        e.galaxyTab89 = (t || "").indexOf("SHV-E140") > -1,
        e.galaxyK = (t || "").indexOf("SWH-M130K") > -1,
        e.galaxyNote = (t || "").indexOf("SHV-E160") > -1;
        if (e.iphone || e.ipad) {
            if (t = t.match(/OS\s([\d|\_]+\s)/i),
            t != null && t.length > 1)
                e.version = t[1]
        } else
            e.android && (t = t.match(/Android\s(\d\.\d)/i),
            t != null && t.length > 1) && (e.version = t[1]);
        return e
    }
    )
}
function getDeviceInfo() {
    return window.m.util || defineMobileUtil(),
    m.util.getDeviceInfo()
}
function getGalaxyTab() {
    return getDeviceInfo().galaxyTab || getDeviceInfo().galaxyTab89
}
function isLogin() {
    return !!$.cookie("NID_SES")
}

function topPage() {
    try {
        window.scrollTo(0, 0)
    } catch (e) {}
}
function getLocalStorage(e) {
    try {
        return window.localStorage ? window.localStorage.getItem(e) : null
    } catch (t) {
        console.log("You are in Privacy Mode\nPlease deactivate Privacy Mode and then reload the page.")
    }
}
function setLocalStorage(e, t) {
    try {
        window.localStorage && window.localStorage.setItem(e, t)
    } catch (n) {
        console.log("You are in Privacy Mode\nPlease deactivate Privacy Mode and then reload the page.")
    }
}
function removeLocalStorage(e) {
    try {
        window.localStorage && window.localStorage.removeItem(e)
    } catch (t) {
        console.log("You are in Privacy Mode\nPlease deactivate Privacy Mode and then reload the page.")
    }
}
function clearLocalStorage() {
    try {
        window.localStorage && window.localStorage.clear()
    } catch (e) {
        console.log("You are in Privacy Mode\nPlease deactivate Privacy Mode and then reload the page.")
    }
}
function selectChannel(e) {
    return $(".lnk_air_wrp2 .air_select a.on").removeClass("on"),
    $(e).toggleClass("on"),
    !1
}

function isMobile() {
    var e = getDeviceInfo().mobile
      , t = getDeviceInfo().ipad
      , n = getGalaxyTab();
    return t && (e = !0),
    n && (e = !0),
    e
}
function isTablet() {
    var e = getDeviceInfo()
      , t = e.mobile
      , n = e.android;
    return e.ipad ? !0 : n ? !t : !1
}
function isTabletView() {
    return $(document).width() >= 768
}
function getParamObject(e) {
    var t = {};
    e = e.split("?");
    var n = e[1]
      , r = ""
      , i = ""
      , s = 0;
    if (n) {
        n = n.split("&");
        for (s = 0; s < n.length; s++)
            n[s].indexOf("=") >= 0 && (n[s].indexOf("#") >= 0 && (n[s] = n[s].substr(0, n[s].indexOf("#"))),
            n[s] && (i = n[s].split("=")),
            t[i[0]] = i[1])
    }
    return t
}
function getStateObject() {
    var e = history.state;
    if (!e)
        return {};
    if (typeof e == "string")
        try {
            return JSON.parse(history.state) || {}
        } catch (t) {
            return {}
        }
    return e.constructor == Object ? e : {}
}
function historyReplaceState(e, t, n) {
    var r = "replaceState"in history && "state"in history;
    r && history.replaceState(JSON.stringify(addAllData(getStateObject(), e)), t, n)
}
function addAllData(e, t) {
    for (var n in t)
        e[n] = t[n];
    return e
}
function getParam(e, t) {
    e = e.split("?");
    var n = e[1]
      , r = ""
      , i = ""
      , s = 0;
    if (n) {
        n = n.split("&");
        for (s = 0; s < n.length; s++)
            n[s].indexOf(t + "=") >= 0 && (n[s].indexOf("#") >= 0 && (n[s] = n[s].substr(0, n[s].indexOf("#"))),
            n[s] && (i = n[s].split("=")),
            r = i[1])
    }
    return r
}
function gameCenterClose() {
    var e = getLocalStorage(gameCenterKey);
    if (e == "" || e == null)
        e = "/index";
    location.href = e
}
function createLink(e, t, n) {
    var r = document.createElement("link");
    r.setAttribute("rel", e),
    t !== "" && r.setAttribute("sizes", t),
    r.setAttribute("href", n),
    document.getElementsByTagName("head")[0].appendChild(r)
}
function initFavicon() {
    var e = eg.agent().os.name
      , t = eg.agent().os.version
      , n = "?v=20140401";
    e === "ios" ? (createLink("apple-touch-icon-precomposed", "57x57", FAVICON_URL + "ios/iOS6_57X57_iphone3.png" + n),
    createLink("apple-touch-icon-precomposed", "72x72", FAVICON_URL + "ios/iOS6_72X72_ipad.png" + n),
    createLink("apple-touch-icon-precomposed", "114x114", FAVICON_URL + "ios/iOS6_114X114_iphone4.png" + n),
    createLink("apple-touch-icon-precomposed", "76x76", FAVICON_URL + "ios/iOS7_76X76_ipad.png" + n),
    createLink("apple-touch-icon-precomposed", "144x144", FAVICON_URL + "ios/iOS6_144X144_ipad_retina.png" + n),
    createLink("apple-touch-icon-precomposed", "120x120", FAVICON_URL + "ios/iOS7_120X120_iphone.png" + n),
    createLink("apple-touch-icon-precomposed", "152x152", FAVICON_URL + "ios/iOS7_152X152_ipad_retina.png" + n)) : e === "android" ? devicePixelRatio > 2 && t >= "4.1" ? createLink("apple-touch-icon-precomposed", "144x144", FAVICON_URL + "android/android_144x144_XXHDPI.png" + n) : createLink("apple-touch-icon-precomposed", "96x96", FAVICON_URL + "android/android_96x96_XHDPI.png" + n) : createLink("apple-touch-icon-precomposed", "96x96", FAVICON_URL + "android/android_96x96_XHDPI.png" + n),
    createLink("shortcut icon", "", FAVICON_URL + "favicon.ico" + n)
}

function imageOnError(e, t, n) {
    switch (t) {
    case "remove":
        try {
            removeImageOnError(e)
        } catch (r) {}
        break;
    case "emptyImage":
        try {
            emptyImageOnError(e)
        } catch (r) {}
        break;
    case "defaultImage":
        try {
            defaultImageOnError(n, e)
        } catch (r) {}
        break;
    default:
        try {
            removeImageOnError(e)
        } catch (r) {}
    }
}
function removeImageOnError(e) {
    e.parentNode.removeChild(e)
}
function emptyImageOnError(e) {
    e.src = EMPTY_IMAGE_ON_ERROR
}
function defaultImageOnError(e, t) {
    t.onerror = "",
    t.src = e
}
function addClassOnError(e, t) {
    e.classList.add(t)
}
function imageLazyLoading() {
    var e = $(".lazyLoadImage"), t, n = e.length;
    if (n < 1)
        return;
    var r;
    for (var i = 0; i < n; i++)
        t = e[i],
        t.onerror || (t.onerror = function(e) {
            e.target.src = EMPTY_IMAGE_ON_ERROR
        }
        ),
        r = t.getAttribute("lazy-src"),
        r && (t.src = r)
}
function removeItem(e, t) {
    for (var n in e)
        if (e[n] == t) {
            e.splice(n, 1);
            break
        }
}

function convertSocialDateFormat(e) {
    var t = (new Date).getTime()
      , n = e
      , r = 0;
    if (eg.agent().os === "ios" || eg.agent().os.name === "ios") {
        var i = n.split(" ")[0].split("-")
          , s = n.split(" ")[1].split(":");
        r = (new Date(i[0],i[1] - 1,i[2],s[0],s[1],s[2])).getTime()
    } else
        r = (new Date(n)).getTime();
    var o = t - r
      , u = o / 1e3 / 60
      , a = u / 60
      , f = a / 24
      , l = "";
    if (a < 1) {
        var c = Math.floor(u);
        l = c <= 0 ? "1분 전" : Math.floor(u) + "분 전"
    } else if (f < 1)
        l = Math.floor(a) + "시간 전";
    else if (f < 6)
        l = Math.floor(f) + "일 전";
    else {
        var h = n.split(" ")[0].split("-");
        l = h[1] + "." + h[2]
    }
    return l
}
function drawFooterMenu(e, t, n) {
    var r = 1
      , i = t.sections || []
      , s = t.etcs || [];
    aFooterItem = i.concat(s);
    var o = "";
    for (var u = 0; u < aFooterItem.length; u++) {
        var a = aFooterItem[u];
        if (r > n)
            break;
        var f = a.name.replace(/\s+/g, "")
          , l = "onClick=\"nclk(this, '" + a.footerCc + "', '', '');\"";
        o += "<li class='league_li'><a href='" + a.url + "'" + l + ">" + f + "</a></li>",
        r++
    }
    e.html(o)
}
function isIphoneX() {
    var e = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream
      , e = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream
      , t = window.devicePixelRatio || 1
      , n = {
        width: window.screen.width * t,
        height: window.screen.height * t
    };
    return e && n.width == 1125 && n.height === 2436 ? !0 : !1
}
function toggleGoTopBtn() {
    var e = $("#_page_fast2");
    e.isExist() && !isInApp() && $(window).bind("scroll", function() {
        $(window).scrollTop() > 100 ? (e.show(),
        isIphoneX() && $("#wrap").addClass("iphonex")) : e.hide()
    })
}
function showAd() {
    if (bSportsAdLoaded)
        return;
    bSportsAdLoaded = !0
}
function onErrorForLoadingPressLogo(e, t) {
    $("." + e).hide(),
    t && $("." + t).show()
}
function isIosInapp() {
    return eg.agent().os === "ios" && isInApp()
}

function scrollToObj(e, t, n) {
    if (!t.length)
        return;
    var r = n.bVerticalScroll
      , i = n.bSmooth
      , s = 0;
    if (r) {
        var o = $(document).height();
        s = t.parent().offset().top - t.offset().top,
        s += parseInt((o - t.height()) / 2, 10),
        s = Math.max(Math.min(0, s), e.maxScrollY),
        i ? e.scrollTo(0, s, 100, IScroll.utils.ease.circular) : e.scrollTo(0, s)
    } else {
        var u = n.nClientWidth || $(e.wrapper.parentNode).width();
        s = t.parent().offset().left - t.offset().left,
        s += parseInt((u - t.width()) / 2, 10) - parseInt(t.parent().css("margin-left")),
        s = Math.max(Math.min(0, s), e.maxScrollX),
        i ? e.scrollTo(s, 0, 100, IScroll.utils.ease.circular) : e.scrollTo(s, 0)
    }
}
function scrollToCurObj(e, t, n, r) {
    if (!t.length)
        return;
    var i = 0;
    if (n) {
        var s = $(document).height();
        i = t.parent().offset().top - t.offset().top,
        i += parseInt((s - t.height()) / 2, 10),
        i = Math.max(Math.min(0, i), e.maxScrollY),
        r ? e.scrollTo(0, i, 100, IScroll.utils.ease.circular) : e.scrollTo(0, i)
    } else {
        var o = $(document).width();
        i = t.parent().offset().left - t.offset().left,
        i += parseInt((o - t.width()) / 2, 10) - parseInt(t.parent().css("margin-left")),
        i = Math.max(Math.min(0, i), e.maxScrollX),
        r ? e.scrollTo(i, 0, 100, IScroll.utils.ease.circular) : e.scrollTo(i, 0)
    }
}
function defaultNewIscroll(e, t, n) {
    _.isUndefined(n) && (n = {});
    if (_.isElement($(e)[0])) {
        var r = n.preventVerticalScroll || !1
          , i = new IScroll(e,t);
        if (r === !0) {
            var s = {
                x: 0,
                y: 0
            };
            function o(e) {
                s.x = e.touches[0].pageX,
                s.y = e.touches[0].pageY
            }
            function u(e) {
                return Math.abs(s.x - e.touches[0].pageX) > Math.abs(s.y - e.touches[0].pageY) && e.preventDefault(),
                s
            }
            $(e)[0].addEventListener("touchstart", o),
            $(e)[0].addEventListener("touchmove", u)
        }
        return i
    }
    return
}
function newIscroll(e, t, n, r) {
    if (_.isUndefined(window.IScroll))
        return;
    $(e).css("visibility", "hidden");
    var i;
    _.isElement($(e)[0]) && (i = defaultNewIscroll(e, t, r),
    eg.rotate && eg.rotate.on(function() {
        setTimeout(function() {
            scrollToCurObj(i, $(n))
        }, 100)
    }));
    if (_.isNull(i)) {
        $(e).css("visibility", "visible");
        return
    }
    return _.isUndefined(n) ? ($(e).css("visibility", "visible"),
    i) : (scrollToCurObj(i, $(n)),
    $(e).css("visibility", "visible"),
    i)
}
function replaceScriptTagHint(e) {
    return e = replaceAll(e, "@tagOpen@", "<"),
    e = replaceAll(e, "@tagClose@", ">"),
    e = replaceAll(e, "@braceOpen@", "{"),
    e = replaceAll(e, "@braceClose@", "}"),
    e
}
function isInApp() {
    var e = navigator.userAgent.toLowerCase();
    return e.indexOf("inapp") >= 0 || e.indexOf("higgs") >= 0
}
function waitPromise(e) {
    return new Promise(function(t) {
        setTimeout(t, e)
    }
    )
}
function isDarkMode() {
    var e = navigator.appVersion
      , t = new RegExp("NAVER\\((\\S+);\\s(\\S+);\\s(\\S+);\\s(\\S+)(?:;\\s(\\S+))?\\)")
      , n = e.match(t)
      , r = window.matchMedia("(prefers-color-scheme: dark)").matches
      , i = n !== null && Number(n[3]) >= 1e3 && r
      , s = document.cookie.includes("NSCS=1") && r;
    return i || s
}
function initDarkModeIfWant() {
    isDarkMode() && document.documentElement.classList.add("DARK_THEME")
}
function isServiceDarkModeActive() {
    return document.documentElement.classList.contains("DARK_THEME")
}


jQuery.fn.outerHTML = function() {
    return $("<div>").append(this.eq(0).clone()).html()
}
,
jQuery.fn.visible = function() {
    return this.eq(0).is(":visible")
}
,
jQuery.fn.isExist = function() {
    return this.length > 0
}
,
jQuery.cachedScript = function(e, t) {
    return t = $.extend(t || {}, {
        dataType: "script",
        cache: !0,
        url: e
    }),
    jQuery.ajax(t)
}
;
var horizontalScrollOpt = {
    eventPassthrough: !0,
    scrollX: !0,
    scrollY: !1,
    preventDefault: !1
}
  , thresholdHorizontalScrollOpt = {
    probeType: 3,
    eventPassthrough: !0,
    scrollX: !0,
    scrollY: !1,
    preventDefault: !1,
    bounceTime: 200
}
  , verticalScrollOpt = {
    eventPassthrough: !1,
    scrollX: !1,
    scrollY: !0,
    preventDefault: !1,
    bounceTime: 200
}
  , _historyMainScrollOpt = {
    eventPassthrough: !1,
    scrollX: !1,
    scrollY: !0,
    preventDefault: !0
}
  , commonFlickingOpt = {
    hwAccelerable: !1,
    deceleration: .02
};




nc = window.nc || {},
nc.sports = nc.sports || {},
nc.sports.m = nc.sports.m || {},
window.console == undefined && (console = {
    log: function() {}
}),
nc.sports.m.Record = eg.Class({
    construct: function(e) {
        this._initVars(e),
        this._drawContents(),
        this._initEvent(),
        this._initScroll()
    },
    _initVars: function(e) {
  
        this._recordHeaderScroll = null,
        this._recordTableScroll = null,
        this._htTopHeaderScrollId = e.topHeaderScrollId || "top_scroll",
        this._htRecordTableScrollId = e.recordTableScrollId || "record_scroll",
        this._$rank = $("#" + (e.rankId || "rank")),
        this._rankTemplate = $("#" + (e.rankTemplate || "rank_template")).html(),
        this._$recordHeader = $("#" + (e.recordHeaderId || "record_header")),
        typeof e.recordHeaderTemplate == "object" ? this._htYear >= e.changePointYear ? (this._recordHeaderTemplate = $("#" + e.recordHeaderTemplate[0]).html(),
        this._recordTemplate = $("#" + e.recordTemplate[0]).html()) : (this._recordHeaderTemplate = $("#" + e.recordHeaderTemplate[1]).html(),
        this._recordTemplate = $("#" + e.recordTemplate[1]).html()) : (this._recordHeaderTemplate = $("#" + (e.recordHeaderTemplate || "record_header_template")).html(),
        this._recordTemplate = $("#" + (e.recordTemplate || "record_table_template")).html()),
        this._$record = $("#" + (e.recordId || "record_table")),
        this._rankIncrease = 1
    },
    _initScroll: function() {
        var e = "#" + this._htTopHeaderScrollId
          , t = "#" + this._htRecordTableScrollId;
        $(e).addClass("new_scroll"),
        $(e + " > div").addClass("scroller"),
        $(t).addClass("new_scroll"),
        $(t + " > div").addClass("scroller"),
        this._recordHeaderScroll = defaultNewIscroll(e, horizontalScrollOpt, {
            preventVerticalScroll: !0
        }),
        this._recordTableScroll = defaultNewIscroll(t, horizontalScrollOpt, {
            preventVerticalScroll: !0
        }),
        this._moveScroll(),
        eg.rotate && eg.rotate.on(function() {
            setTimeout(function() {
                this._recordHeaderScroll && this._recordTableScroll && (this._recordHeaderScroll.refresh(),
                this._recordTableScroll.refresh())
            }, 0)
        })
    },
    _moveScroll: function() {
        var e = this._$recordHeader.find("th.on")[0];
        if (e) {
            var t = $(document).width() - this._$rank.width()
              , n = e.offsetLeft
              , r = (this._$recordHeader.offset().left - this._$rank.width()) * -1;
            this._$recordHeader.width() - n < t ? this._recordTableScroll.scrollTo((this._$recordHeader.width() - t) * -1, 0, 0) : n != r && this._recordTableScroll.scrollTo(n * -1, 0, 0)
        }
    },

});
