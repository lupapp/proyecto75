$(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            nombre: {
                message: 'Nombre no valido',
                validators: {
                    notEmpty: {
                        message: 'El nombre no puede estar vacio'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Debe tener mínimo 6 caracteres, máximo 30'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]/,
                        message: 'El nombre no debe tener carácteres especiales'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El correo electrónico no puede estar vacio'
                    },
                    emailAddress: {
                        message: 'Ingrese un correo valido'
                    }
                }
            },
            cc: {
               validators: {
                    notEmpty: {
                        message: 'El documento no puede estar vacio'
                    },
                    stringLength: {
                        min: 6,
                        max: 12,
                        message: 'Debe tener mínimo 6 caracteres, máximo 12'
                    }
                }
            }
        }
    });
});