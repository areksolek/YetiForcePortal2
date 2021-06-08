/* {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} */
'use strict';

window.Base_PasswordChangeModal_JS = class {
	/**
	 * Function to register the click event for generate button
	 */
	registerSubmitEvent() {
		let formElement = this.container.find('form');
		formElement.validationEngine(app.validationEngineOptions);
		formElement.on('submit', function (e) {
			e.preventDefault();
			if (formElement.validationEngine('validate') === true) {
				let formData = formElement.serializeFormData();
				AppConnector.request(formData).done((data) => {
					// let data = JSON.parse(data);
					// let response = data.result;
				});
			}
		});
	}

	/**
	 * Register modal events.
	 * @param {jQuery} modalContainer
	 */
	registerEvents(modalContainer) {
		this.container = modalContainer;
		this.registerSubmitEvent();
	}
};
