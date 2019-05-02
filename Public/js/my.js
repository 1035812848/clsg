(function () {
	jQuery.extend({
		alert:function (message,title) {
			var alertModel = $(alertModel);
			alertModel.find(".modal-title").html(title || "消息");
			alertModel.find(".modal-body").html(message);
			alertModel.modal("show");
		}
	});
	jQuery.fn.extend({
		myValidate:function (cfg) {
			cfg = cfg || {};
			cfg.showErrors = cfg.showErrors || showErrors;
			this.validate(cfg);
		},
		showFieldError:function (message) {
			var group = this.parent(".input-group");
			var errDiv = group.next('.error-div');
			if (errDiv.length < 1 ) {
				errDiv = $("<div></div>",{'class':'error-div'}).insertAfter(group);
			}
			errDiv.html(message);
		},
		showFieldSuccess:function () {
			this.parent(".input-group").next(".error-div").html('');
		}
	});

	function showErrors() {
		for (var i=0;i<this.errorList.length;i++) {
			var err = this.errorList[i];
			$(err.element).showFieldError(err.message);
		}
		for (var i=0;i<this.successList.length;i++) {
			$(this.successList[i]).showFieldSuccess();
		}
	}

	var alertModel = "<div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\">\n" +
		"  <div class=\"modal-dialog\" role=\"document\">\n" +
		"    <div class=\"modal-content\">\n" +
		"      <div class=\"modal-header\">\n" +
		"        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\n" +
		"        <h4 class=\"modal-title\"></h4>\n" +
		"      </div>\n" +
		"      <div class=\"modal-body\">\n" +
		"      </div>\n" +
		"      <div class=\"modal-footer\">\n" +
		"        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">确定</button>\n" +
		"      </div>\n" +
		"    </div><!-- /.modal-content -->\n" +
		"  </div><!-- /.modal-dialog -->\n" +
		"</div><!-- /.modal -->";

})();

