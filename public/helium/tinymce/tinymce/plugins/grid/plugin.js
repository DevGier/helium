/*! For license information please see plugin.js.LICENSE.txt */
(() => {
  var e = {
      745: () => {
        tinymce.addI18n("en", {
          "grid.insert": "Insert grid",
          "grid.remove": "Delete grid",
          "grid.row": "Row",
          "grid.row.insert_after": "Insert row before",
          "grid.row.insert_before": "Insert row after",
          "grid.row.remove": "Delete row",
          "grid.column": "Column",
          "grid.column.insert_after": "Insert column after",
          "grid.column.insert_before": "Insert column before",
          "grid.column.remove": "Delete column",
          "grid.column.properties": "Column properties",
        });
      },
    },
    t = {};
  function n(r) {
    if (t[r]) return t[r].exports;
    var i = (t[r] = { exports: {} });
    return e[r](i, i.exports, n), i.exports;
  }
  (() => {
    "use strict";
    var e = function (t, n) {
      return (e =
        Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array &&
          function (e, t) {
            e.__proto__ = t;
          }) ||
        function (e, t) {
          for (var n in t)
            Object.prototype.hasOwnProperty.call(t, n) && (e[n] = t[n]);
        })(t, n);
    };
    function t(t, n) {
      function r() {
        this.constructor = t;
      }
      e(t, n),
        (t.prototype =
          null === n
            ? Object.create(n)
            : ((r.prototype = n.prototype), new r()));
    }
    function r() {
      for (var e = 0, t = 0, n = arguments.length; t < n; t++)
        e += arguments[t].length;
      var r = Array(e),
        i = 0;
      for (t = 0; t < n; t++)
        for (var o = arguments[t], s = 0, l = o.length; s < l; s++, i++)
          r[i] = o[s];
      return r;
    }
    Object.create, Object.create, n(886), n(745);
    const i = (function () {
        function e(e, t, n) {
          (this.settings = e),
            (this.editor = t),
            (this.i18n = n),
            (this.classNames = ["grid-container", "grid-row", "grid-col"]),
            (this.onKeyDown = this.onKeyDown.bind(this)),
            (this.onBeforeExecCommand = this.onBeforeExecCommand.bind(this)),
            t.on("keydown", this.onKeyDown),
            t.on("BeforeExecCommand", this.onBeforeExecCommand);
        }
        return (
          (e.prototype.onKeyDown = function (e) {
            var t = this,
              n = e.charCode || e.keyCode,
              r = this.editor.selection.getNode(),
              i = r.parentNode,
              o = this.editor.selection.getRng(!1);
            if (8 === n) {
              if (o.startOffset > 0) return;
              if (
                o.startOffset <= 0 &&
                this.classNames.some(function (e) {
                  return r.classList.contains(e);
                })
              )
                return e.preventDefault(), !1;
              if (
                i &&
                1 === i.childElementCount &&
                this.classNames.some(function (e) {
                  return i.classList.contains(e);
                })
              ) {
                if (
                  !this.classNames.some(function (e) {
                    return r.classList.contains(e);
                  })
                ) {
                  if (o.startOffset <= 0) return e.preventDefault(), !1;
                  this.editor.undoManager.transact(function () {
                    t.editor.dom.remove(r),
                      t.editor.execCommand(
                        "mceInsertContent",
                        !1,
                        t.editor.dom.createHTML("p")
                      );
                  });
                }
                return e.preventDefault(), !1;
              }
            }
            if (46 === n) {
              if (
                i &&
                1 === i.childElementCount &&
                this.classNames.some(function (e) {
                  return i.classList.contains(e);
                })
              )
                return e.preventDefault(), !1;
              if (o.startOffset > 0) return;
              if (
                this.classNames.some(function (e) {
                  return r.classList.contains(e);
                })
              )
                return e.preventDefault(), !1;
            }
          }),
          (e.prototype.onBeforeExecCommand = function (e) {
            if (
              "InsertOrderedList" === e.command ||
              "InsertUnorderedList" === e.command ||
              "InsertDefinitionList" === e.command
            ) {
              var t = this.editor.selection.getNode();
              this.classNames.forEach(function (n) {
                if (t.classList.contains("" + n)) return e.preventDefault(), !1;
              });
            }
          }),
          e
        );
      })(),
      o = (function () {
        function e(e, t, n) {
          (this.settings = e),
            (this.editor = t),
            (this.i18n = n),
            (this.getElement = this.getElement.bind(this)),
            (this.isElement = this.isElement.bind(this)),
            (this.getElementColumn = this.getElementColumn.bind(this)),
            (this.isElementColumn = this.isElementColumn.bind(this)),
            (this.getElementRow = this.getElementRow.bind(this)),
            (this.isElementRow = this.isElementRow.bind(this)),
            (this.selectElement = this.selectElement.bind(this));
        }
        return (
          (e.prototype.cmd = function (e, t) {
            var n = this;
            return (
              void 0 === t && (t = null),
              function () {
                return n.editor.execCommand(e, !1, t);
              }
            );
          }),
          (e.prototype.getElement = function () {
            return this.editor.dom.getParent(
              this.editor.selection.getStart(),
              ".grid-container"
            );
          }),
          (e.prototype.isElement = function (e) {
            return (
              this.editor.dom.is(e, ".grid-container") &&
              this.editor.getBody().contains(e)
            );
          }),
          (e.prototype.getElementColumn = function () {
            return this.editor.dom.getParent(
              this.editor.selection.getStart(),
              ".grid-col"
            );
          }),
          (e.prototype.isElementColumn = function (e) {
            return !(
              !this.editor.dom.is(e, ".grid-col") ||
              !this.editor.getBody().contains(e)
            );
          }),
          (e.prototype.getElementRow = function () {
            return this.editor.dom.getParent(
              this.editor.selection.getStart(),
              ".grid-row"
            );
          }),
          (e.prototype.isElementRow = function (e) {
            return (
              this.editor.dom.is(e, ".grid-row") &&
              this.editor.getBody().contains(e)
            );
          }),
          (e.prototype.selectElement = function (e) {
            this.getElementColumn() &&
              (this.editor.selection.collapse(), this.editor.focus(!1));
          }),
          e
        );
      })(),
      s = (function () {
        function e(e) {
          this.preset = e;
        }
        return (
          (e.prototype.render = function (e, t) {
            var n = this,
              i = "selected" in t ? t.selected : {};
            return {
              title: "Insert column",
              data: {},
              body: r(
                this.preset.breakpoints.map(function (e) {
                  return n.breadpoint(e, i);
                })
              ),
              onSubmit: e,
            };
          }),
          (e.prototype.getSelected = function (e) {
            var t = this,
              n = {};
            return (
              this.preset.breakpoints.forEach(function (r) {
                var i = t.preset.columnClassRegex(r.preffix).exec(e),
                  o = "";
                i && i.length > 1 && (o = i[1]), (n[r.value] = o);
              }),
              n
            );
          }),
          (e.prototype.breadpoint = function (e, t) {
            return {
              type: "container",
              label: e.text,
              layout: "flex",
              direction: "row",
              align: "center",
              spacing: 5,
              items: [
                {
                  type: "listbox",
                  name: e.value,
                  value: e.value in t ? t[e.value] : "",
                  values: this.preset.columns,
                },
              ],
            };
          }),
          e
        );
      })(),
      l = (function (e) {
        function n(t, r, i, o) {
          var l = e.call(this, t, i, o) || this;
          return (
            (l.settings = t),
            (l.preset = r),
            (l.editor = i),
            (l.i18n = o),
            (l.insertColumnDialog = new s(l.preset)),
            (l.insert = l.insert.bind(l)),
            (l.insertAfter = l.insertAfter.bind(l)),
            (l.insertBefore = l.insertBefore.bind(l)),
            (l.delete = l.delete.bind(l)),
            (l.properties = l.properties.bind(l)),
            (l.onInsertSubmit = l.onInsertSubmit.bind(l)),
            i.addCommand(n.CMD_INSERT_AFTER_COLUMN, l.insertAfter),
            i.addCommand(n.CMD_INSERT_BEFORE_COLUMN, l.insertBefore),
            i.addCommand(n.CMD_DELETE_COLUMN, l.delete),
            i.addCommand(n.CMD_PROPERTIES_COLUMN, l.properties),
            i.addButton(n.BTN_COLUMN_PROPERTIES, {
              icon: "tablecellprops",
              cmd: n.CMD_PROPERTIES_COLUMN,
              context: "properties",
              tooltip: o.translate("grid.column.properties"),
            }),
            i.addButton(n.BTN_COLUMN_INSERT_AFTER, {
              icon: "tableinsertcolafter",
              cmd: n.CMD_INSERT_AFTER_COLUMN,
              context: "insert",
              tooltip: o.translate("grid.column.insert_after"),
            }),
            i.addButton(n.BTN_COLUMN_INSERT_BEFORE, {
              icon: "tableinsertcolbefore",
              cmd: n.CMD_INSERT_BEFORE_COLUMN,
              context: "insert",
              tooltip: o.translate("grid.column.insert_before"),
            }),
            i.addButton(n.BTN_COLUMN_DELETE, {
              icon: "tabledeletecol",
              cmd: n.CMD_DELETE_COLUMN,
              context: "delete",
              tooltip: o.translate("grid.column.remove"),
            }),
            l
          );
        }
        return (
          t(n, e),
          (n.prototype.insertAfter = function (e, t) {
            return this.insert(e, "after");
          }),
          (n.prototype.insertBefore = function (e, t) {
            return this.insert(e, "before");
          }),
          (n.prototype.insert = function (e, t) {
            var n = this;
            return (
              !!this.getElementRow() &&
              (this.editor.windowManager.open(
                this.insertColumnDialog.render(function (e) {
                  n.onInsertSubmit(e, t);
                }, {}),
                {}
              ),
              !0)
            );
          }),
          (n.prototype.delete = function (e, t) {
            var n = this.getElementColumn();
            return (
              !!n &&
              1 !== n.parentNode.querySelectorAll(".grid-col").length &&
              (this.editor.dom.remove(n), !0)
            );
          }),
          (n.prototype.onInsertSubmit = function (e, t) {
            var n = e.data,
              r = this.getElementColumn();
            r
              ? "after" === t
                ? r.parentNode.insertBefore(
                    this.preset.renderColumn(n),
                    r.nextSibling
                  )
                : r.parentNode.insertBefore(this.preset.renderColumn(n), r)
              : this.getElementRow().appendChild(this.preset.renderColumn(n));
          }),
          (n.prototype.properties = function (e, t) {
            var n = this,
              r = this.getElementColumn();
            if (r) {
              var i = this.insertColumnDialog.getSelected(r.classList.value);
              return (
                this.editor.windowManager.open(
                  this.insertColumnDialog.render(
                    function (e) {
                      var t = [];
                      r.classList.forEach(function (e) {
                        n.preset.isColumn(e) && t.push(e);
                      }),
                        t.forEach(function (e) {
                          r.classList.remove(e);
                        });
                      var i = function (t) {
                        if (e.data.hasOwnProperty(t)) {
                          var i = e.data[t],
                            o = n.preset.breakpoints.find(function (e) {
                              return e.value === t;
                            });
                          if (!i) return "continue";
                          r.classList.add(n.preset.columnClass(o.preffix, i));
                        }
                      };
                      for (var o in e.data) i(o);
                    },
                    { class: r.classList.value, selected: i }
                  ),
                  {}
                ),
                !0
              );
            }
            return !1;
          }),
          (n.CMD_INSERT_AFTER_COLUMN = "columnInsertAfter"),
          (n.CMD_INSERT_BEFORE_COLUMN = "columnInsertBefore"),
          (n.CMD_DELETE_COLUMN = "columnDelete"),
          (n.CMD_PROPERTIES_COLUMN = "columnProperties"),
          (n.BTN_COLUMN_INSERT_AFTER = "column_insert_after"),
          (n.BTN_COLUMN_INSERT_BEFORE = "column_insert_before"),
          (n.BTN_COLUMN_DELETE = "column_delete"),
          (n.BTN_COLUMN_PROPERTIES = "column_properties"),
          n
        );
      })(o),
      a = (function (e) {
        function n(t, r, i, o) {
          var s = e.call(this, t, i, o) || this;
          return (
            (s.settings = t),
            (s.preset = r),
            (s.editor = i),
            (s.i18n = o),
            (s.insert = s.insert.bind(s)),
            (s.insertAfter = s.insertAfter.bind(s)),
            (s.insertBefore = s.insertBefore.bind(s)),
            (s.delete = s.delete.bind(s)),
            i.addCommand(n.CMD_INSERT_AFTER_ROW, s.insertAfter),
            i.addCommand(n.CMD_INSERT_BEFORE_ROW, s.insertBefore),
            i.addCommand(n.CMD_DELETE_ROW, s.delete),
            i.addButton(n.BTN_ROW_INSERT_AFTER, {
              icon: "tableinsertrowafter",
              cmd: n.CMD_INSERT_AFTER_ROW,
              context: "insert",
              tooltip: o.translate("grid.row.insert_after"),
            }),
            i.addButton(n.BTN_ROW_INSERT_BEFORE, {
              icon: "tableinsertrowbefore",
              cmd: n.CMD_INSERT_BEFORE_ROW,
              context: "insert",
              tooltip: o.translate("grid.row.insert_before"),
            }),
            i.addButton(n.BTN_ROW_DELETE, {
              icon: "tabledeleterow",
              cmd: n.CMD_DELETE_ROW,
              context: "delete",
              tooltip: o.translate("grid.row.remove"),
            }),
            s
          );
        }
        return (
          t(n, e),
          (n.prototype.insertAfter = function (e, t) {
            return this.insert(e, "after");
          }),
          (n.prototype.insertBefore = function (e, t) {
            return this.insert(e, "before");
          }),
          (n.prototype.insert = function (e, t) {
            var n = this.getElementRow();
            if (n) {
              var r = this.preset.renderRow();
              return (
                "after" === t
                  ? n.parentNode.insertBefore(r, n.nextSibling)
                  : n.parentNode.insertBefore(r, n),
                !0
              );
            }
            return !1;
          }),
          (n.prototype.delete = function (e, t) {
            var n = this.getElementRow();
            return !!n && (this.editor.dom.remove(n), !0);
          }),
          (n.CMD_INSERT_AFTER_ROW = "rowInsertAfter"),
          (n.CMD_INSERT_BEFORE_ROW = "rowInsertBefore"),
          (n.CMD_DELETE_ROW = "rowDelete"),
          (n.BTN_ROW_INSERT_AFTER = "row_insert_after"),
          (n.BTN_ROW_INSERT_BEFORE = "row_insert_before"),
          (n.BTN_ROW_DELETE = "row_delete"),
          n
        );
      })(o),
      u = (function (e) {
        function n(t, r, i, o) {
          var s = e.call(this, t, i, o) || this;
          return (
            (s.settings = t),
            (s.preset = r),
            (s.editor = i),
            (s.i18n = o),
            (s.insert = s.insert.bind(s)),
            (s.delete = s.delete.bind(s)),
            i.addCommand(n.CMD_INSERT_GRID, s.insert),
            i.addCommand(n.CMD_DELETE_GRID, s.delete),
            i.addMenuItem(n.BTN_INSERT_GRID, {
              icon: "table",
              text: o.translate("grid.insert"),
              cmd: n.CMD_INSERT_GRID,
              context: "insert",
            }),
            i.addButton(n.BTN_INSERT_GRID, {
              icon: "table",
              cmd: n.CMD_INSERT_GRID,
            }),
            s.editor.addContextToolbar(
              s.isElementColumn,
              n.BTN_DELETE_GRID +
                " | " +
                l.BTN_COLUMN_PROPERTIES +
                " " +
                l.BTN_COLUMN_INSERT_AFTER +
                " " +
                l.BTN_COLUMN_INSERT_BEFORE +
                " " +
                l.BTN_COLUMN_DELETE +
                " | " +
                a.BTN_ROW_INSERT_AFTER +
                " " +
                a.BTN_ROW_INSERT_BEFORE +
                " " +
                a.BTN_ROW_DELETE
            ),
            s
          );
        }
        return (
          t(n, e),
          (n.prototype.insert = function (e, t) {
            return (
              !this.getElement() &&
              (this.editor.execCommand(
                "mceInsertContent",
                !1,
                this.preset.renderContainer().outerHTML
              ),
              !0)
            );
          }),
          (n.prototype.delete = function (e, t) {
            var n = this.getElement();
            return !!n && (this.editor.dom.remove(n), !0);
          }),
          (n.CMD_INSERT_GRID = "gridInsert"),
          (n.CMD_DELETE_GRID = "gridDelete"),
          (n.BTN_INSERT_GRID = "grid_insert"),
          (n.BTN_DELETE_GRID = "grid_delete"),
          n
        );
      })(o),
      c = (function () {
        function e(e) {
          this.editor = e;
        }
        return (
          Object.defineProperty(e.prototype, "preset", {
            get: function () {
              var t = this.editor.getParam("grid_preset", e.presets[0]);
              if (!(t in e.presets)) return t;
              throw new Error('Unknown grid preset "' + t + '"');
            },
            enumerable: !1,
            configurable: !0,
          }),
          (e.presets = ["Bootstrap3", "Bootstrap4", "Foundation5"]),
          e
        );
      })();
    var d = {
      Bootstrap3: (function () {
        function e(e, t) {
          var n = this;
          (this.settings = e),
            (this.editor = t),
            (this.columns = [
              { text: "Select column", value: "" },
              { text: "1", value: "1" },
              { text: "2", value: "2" },
              { text: "3", value: "3" },
              { text: "4", value: "4" },
              { text: "5", value: "5" },
              { text: "6", value: "6" },
              { text: "7", value: "7" },
              { text: "8", value: "8" },
              { text: "9", value: "9" },
              { text: "10", value: "10" },
              { text: "11", value: "11" },
              { text: "12", value: "12" },
            ]),
            (this.breakpoints = [
              { text: "Extra small", value: "extra_small", preffix: "xs" },
              { text: "Small", value: "small", preffix: "sm" },
              { text: "Medium", value: "medium", preffix: "md" },
              { text: "Large", value: "large", preffix: "lg" },
            ]),
            (this.style = function () {
              return "bootstrap3.css";
            }),
            (this.columnClassRegex = function (e) {
              return new RegExp("col-" + e + "-([\\d]+)", "gi");
            }),
            (this.columnClass = function (e, t) {
              return "col-" + e + "-" + t;
            }),
            (this.isColumn = function (e) {
              return !!n.breakpoints.find(function (t) {
                return !!n.columns.find(function (r) {
                  return n.columnClass(t.preffix, r.value) === e;
                });
              });
            });
        }
        return (
          (e.prototype.renderContainer = function () {
            var e = document.createElement("div");
            return (
              (e.innerHTML =
                '\n        <div class="grid-container container">\n            <div class="grid-row row">\n                <div class="grid-col col-lg-12"><p>Lorem ipsum</p></div>\n            </div>\n        </div>'.trim()),
              e
            );
          }),
          (e.prototype.renderRow = function () {
            var e = document.createElement("div");
            return (
              (e.innerHTML =
                '\n        <div class="grid-row row">\n            <div class="grid-col col-lg-12"><p>Lorem ipsum</p></div>\n        </div>'.trim()),
              e.firstChild
            );
          }),
          (e.prototype.renderColumn = function (e) {
            var t =
                '<div class="grid-col ' +
                (
                  (e.extra_small.length > 0 ? "col-sm-" + e.extra_small : "") +
                  " " +
                  (e.small.length > 0 ? "col-sm-" + e.small : "") +
                  " " +
                  (e.medium.length > 0 ? "col-md-" + e.medium : "") +
                  " " +
                  (e.large.length > 0 ? "col-lg-" + e.large : "")
                ).trim() +
                '"><p>Lorem ipsum</p></div>',
              n = document.createElement("div");
            return (n.innerHTML = t.trim()), n.firstChild;
          }),
          e
        );
      })(),
      Bootstrap4: (function () {
        function e(e, t) {
          var n = this;
          (this.settings = e),
            (this.editor = t),
            (this.columns = [
              { text: "Select column", value: "" },
              { text: "1", value: "1" },
              { text: "2", value: "2" },
              { text: "3", value: "3" },
              { text: "4", value: "4" },
              { text: "5", value: "5" },
              { text: "6", value: "6" },
              { text: "7", value: "7" },
              { text: "8", value: "8" },
              { text: "9", value: "9" },
              { text: "10", value: "10" },
              { text: "11", value: "11" },
              { text: "12", value: "12" },
            ]),
            (this.breakpoints = [
              { text: "Extra small", value: "extra_small", preffix: "xs" },
              { text: "Small", value: "small", preffix: "sm" },
              { text: "Medium", value: "medium", preffix: "md" },
              { text: "Large", value: "large", preffix: "lg" },
            ]),
            (this.style = function () {
              return "bootstrap4.css";
            }),
            (this.columnClassRegex = function (e) {
              return new RegExp("col-" + e + "-([\\d]+)", "gi");
            }),
            (this.columnClass = function (e, t) {
              return "col-" + e + "-" + t;
            }),
            (this.isColumn = function (e) {
              return !!n.breakpoints.find(function (t) {
                return !!n.columns.find(function (r) {
                  return n.columnClass(t.preffix, r.value) === e;
                });
              });
            });
        }
        return (
          (e.prototype.renderContainer = function () {
            var e = document.createElement("div");
            return (
              (e.innerHTML =
                '\n        <div class="grid-container container">\n            <div class="grid-row row">\n                <div class="grid-col col-lg-12"><p>Lorem ipsum</p></div>\n            </div>\n        </div>'.trim()),
              e
            );
          }),
          (e.prototype.renderRow = function () {
            var e = document.createElement("div");
            return (
              (e.innerHTML =
                '\n        <div class="grid-row row">\n            <div class="grid-col col-lg-12"><p>Lorem ipsum</p></div>\n        </div>'.trim()),
              e.firstChild
            );
          }),
          (e.prototype.renderColumn = function (e) {
            var t =
                '<div class="grid-col ' +
                (
                  (e.extra_small.length > 0 ? "col-sm-" + e.extra_small : "") +
                  " " +
                  (e.small.length > 0 ? "col-sm-" + e.small : "") +
                  " " +
                  (e.medium.length > 0 ? "col-md-" + e.medium : "") +
                  " " +
                  (e.large.length > 0 ? "col-lg-" + e.large : "")
                ).trim() +
                '"><p>Lorem ipsum</p></div>',
              n = document.createElement("div");
            return (n.innerHTML = t.trim()), n.firstChild;
          }),
          e
        );
      })(),
      Foundation5: (function () {
        function e(e, t) {
          var n = this;
          (this.settings = e),
            (this.editor = t),
            (this.columns = [
              { text: "Select column", value: "" },
              { text: "1", value: "1" },
              { text: "2", value: "2" },
              { text: "3", value: "3" },
              { text: "4", value: "4" },
              { text: "5", value: "5" },
              { text: "6", value: "6" },
              { text: "7", value: "7" },
              { text: "8", value: "8" },
              { text: "9", value: "9" },
              { text: "10", value: "10" },
              { text: "11", value: "11" },
              { text: "12", value: "12" },
            ]),
            (this.breakpoints = [
              { text: "Small", value: "small", preffix: "small" },
              { text: "Medium", value: "medium", preffix: "medium" },
              { text: "Large", value: "large", preffix: "large" },
            ]),
            (this.style = function () {
              return "foundation5.css";
            }),
            (this.columnClassRegex = function (e) {
              return new RegExp(e + "-([\\d]+)", "gi");
            }),
            (this.columnClass = function (e, t) {
              return e + "-" + t;
            }),
            (this.isColumn = function (e) {
              return !!n.breakpoints.find(function (t) {
                return !!n.columns.find(function (r) {
                  return n.columnClass(t.preffix, r.value) === e;
                });
              });
            });
        }
        return (
          (e.prototype.renderContainer = function () {
            var e = document.createElement("div");
            return (
              (e.innerHTML =
                '\n        <div class="grid-container container">\n            <div class="grid-row row">\n                <div class="grid-col columns large-12"><p>Lorem ipsum</p></div>\n            </div>\n        </div>'.trim()),
              e
            );
          }),
          (e.prototype.renderRow = function () {
            var e = document.createElement("div");
            return (
              (e.innerHTML =
                '\n        <div class="grid-row row">\n            <div class="grid-col columns large-12"><p>Lorem ipsum</p></div>\n        </div>'.trim()),
              e.firstChild
            );
          }),
          (e.prototype.renderColumn = function (e) {
            var t =
                '<div class="grid-col columns ' +
                (
                  (e.small.length > 0 ? "small-" + e.small : "") +
                  " " +
                  (e.medium.length > 0 ? "medium-" + e.medium : "") +
                  " " +
                  (e.large.length > 0 ? "large-" + e.large : "")
                ).trim() +
                '"><p>Lorem ipsum</p></div>',
              n = document.createElement("div");
            return (n.innerHTML = t.trim()), n.firstChild;
          }),
          e
        );
      })(),
    };
    tinymce.PluginManager.requireLangPack("grid"),
      tinymce.PluginManager.add("grid", function (e, t) {
        return (
          (n = void 0),
          (r = void 0),
          (s = function () {
            var n, r;
            return (function (e, t) {
              var n,
                r,
                i,
                o,
                s = {
                  label: 0,
                  sent: function () {
                    if (1 & i[0]) throw i[1];
                    return i[1];
                  },
                  trys: [],
                  ops: [],
                };
              return (
                (o = { next: l(0), throw: l(1), return: l(2) }),
                "function" == typeof Symbol &&
                  (o[Symbol.iterator] = function () {
                    return this;
                  }),
                o
              );
              function l(o) {
                return function (l) {
                  return (function (o) {
                    if (n)
                      throw new TypeError("Generator is already executing.");
                    for (; s; )
                      try {
                        if (
                          ((n = 1),
                          r &&
                            (i =
                              2 & o[0]
                                ? r.return
                                : o[0]
                                ? r.throw || ((i = r.return) && i.call(r), 0)
                                : r.next) &&
                            !(i = i.call(r, o[1])).done)
                        )
                          return i;
                        switch (
                          ((r = 0), i && (o = [2 & o[0], i.value]), o[0])
                        ) {
                          case 0:
                          case 1:
                            i = o;
                            break;
                          case 4:
                            return s.label++, { value: o[1], done: !1 };
                          case 5:
                            s.label++, (r = o[1]), (o = [0]);
                            continue;
                          case 7:
                            (o = s.ops.pop()), s.trys.pop();
                            continue;
                          default:
                            if (
                              !(
                                (i =
                                  (i = s.trys).length > 0 && i[i.length - 1]) ||
                                (6 !== o[0] && 2 !== o[0])
                              )
                            ) {
                              s = 0;
                              continue;
                            }
                            if (
                              3 === o[0] &&
                              (!i || (o[1] > i[0] && o[1] < i[3]))
                            ) {
                              s.label = o[1];
                              break;
                            }
                            if (6 === o[0] && s.label < i[1]) {
                              (s.label = i[1]), (i = o);
                              break;
                            }
                            if (i && s.label < i[2]) {
                              (s.label = i[2]), s.ops.push(o);
                              break;
                            }
                            i[2] && s.ops.pop(), s.trys.pop();
                            continue;
                        }
                        o = t.call(e, s);
                      } catch (e) {
                        (o = [6, e]), (r = 0);
                      } finally {
                        n = i = 0;
                      }
                    if (5 & o[0]) throw o[1];
                    return { value: o[0] ? o[1] : void 0, done: !0 };
                  })([o, l]);
                };
              }
            })(this, function (o) {
              return (
                (n = new c(e)),
                (r = (function (e, t) {
                  return new d[e.preset]();
                })(n)),
                e.contentCSS.push(t + "/" + r.style()),
                new i(n, e, tinymce.util.I18n),
                new a(n, r, e, tinymce.util.I18n),
                new l(n, r, e, tinymce.util.I18n),
                new u(n, r, e, tinymce.util.I18n),
                [2]
              );
            });
          }),
          new ((o = void 0) || (o = Promise))(function (e, t) {
            function i(e) {
              try {
                a(s.next(e));
              } catch (e) {
                t(e);
              }
            }
            function l(e) {
              try {
                a(s.throw(e));
              } catch (e) {
                t(e);
              }
            }
            function a(t) {
              var n;
              t.done
                ? e(t.value)
                : ((n = t.value),
                  n instanceof o
                    ? n
                    : new o(function (e) {
                        e(n);
                      })).then(i, l);
            }
            a((s = s.apply(n, r || [])).next());
          })
        );
        var n, r, o, s;
      });
  })();
})();
