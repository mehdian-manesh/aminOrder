/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/myScripts.js":
/*!***********************************!*\
  !*** ./resources/js/myScripts.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _goto(url) {
  location.href = url;
}

function log() {
  var argument = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "hello!";
  console.log(argument);
}

var EventFunctions = {
  change_confirmation: function change_confirmation(arg) {
    $.ajax({
      url: arg.data.url,
      type: 'PATCH',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        change_confirmation: true,
        id: arg.data.id,
        _method: "PATCH"
      },
      success: function success(arg) {
        location.reload(true);
      }
    });
  },
  "delete": function _delete(arg) {
    $.ajax({
      url: arg.data.url,
      type: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        change_confirmation: true,
        id: arg.data.id,
        _method: "DELETE"
      },
      success: function success(arg) {
        location.reload(true);
      }
    });
  }
};
$('#modalCenter').on('show.bs.modal', function (event) {
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  orders_id = $(event.relatedTarget).data('orders_id');
  url = $(event.relatedTarget).data('url');
  title = $(event.relatedTarget).data('title');
  body = $(event.relatedTarget).data('body');
  yes_btn_event = $(event.relatedTarget).data('yes_btn_event');
  $(this).find('.modal-title').text(title);
  $(this).find('.modal-body').text(body); // $(this).find('.btn btn-primary').click(EventFunctions[yes_btn_event](url));
  // $(this).on('click', '#modalCenterYesBtn',log("event!"));

  $("#modalCenterYesBtn").one("click", {
    url: url,
    id: orders_id
  }, EventFunctions[yes_btn_event]);
});
$('#modalCenter').on('hide.bs.modal', function (event) {
  $("#modalCenterYesBtn").off("click");
});
$('#modalTable').on('show.bs.modal', function (event) {
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // $.ajaxSetup({
  // 	headers: {
  // 		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  // 	}
  // });
  jQuery.ajax({
    url: $(event.relatedTarget).data('url'),
    method: 'get',
    success: function success(result) {
      datas = JSON.parse(result);
      console.log(datas);
      titles = Object.keys(datas);
      values = Object.values(datas);
      $('#modalTableHeader').html("");
      $('#modalTableBody').html("");

      for (var i = 0; i < titles.length; i++) {
        $('#modalTableHeader').html($('#modalTableHeader').html() + "\n<td>\n" + titles[i] + "\n</td>");
        $('#modalTableBody').html($('#modalTableBody').html() + "\n<td>\n" + values[i] + "\n</td>");
      }
    }
  }); // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  $(this).find('.modal-title').text($(event.relatedTarget).data('title'));
});

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/myScripts.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/Documents/work/laravel/amin/phpdesktop-chrome-57.0-rc-php-7.1.3/www/resources/js/myScripts.js */"./resources/js/myScripts.js");


/***/ })

/******/ });