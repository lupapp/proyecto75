$(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            usuario: {
                message: 'Usuario no valido',
                validators: {
                    notEmpty: {
                        message: 'El usuario no puede estar vacio'
                    },
                    stringLength: {
                        min: 4,
                        max: 15,
                        message: 'Debe tener mínimo 6 caracteres, máximo 30'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]/,
                        message: 'El nombre no debe tener carácteres especiales'
                    }
                }
            },
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
            },
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'Las contraseñas deben ser iguales'
                    },
                    notEmpty: {
                        message: 'La contraseña no puede estar vacia'
                    },
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'Las contraseñas deben ser iguales'
                    },
                    notEmpty: {
                        message: 'La contraseña no puede estar vacia'
                    },
                }
            },
            /********Validacion planes*********/
            plan: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del plan no puede estar vacio '
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]/,
                        message: 'El nombre no debe tener carácteres especiales '
                    }
                }
            },
            valor_plan: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del plan no puede estar vacio '
                    },
                }
            },
            avatar: {
                validators: {
                    notEmpty: {
                        message: 'Please select an image '
                    },
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 2097152,   // 2048 * 1024
                        message: 'Tipo de archivo invalido '

                    },
                    file: {
                        maxSize: 2097152,   // 2048 * 1024
                        message: 'Achivo exede el tamaño de 2Mb '

                    }
                }
            },
            valor_plan: {
                validators: {
                    notEmpty: {
                        message: 'El valor no puede estar vacio '
                    },
                    stringLength: {
                        min: 1,
                        max: 6,
                        message: 'Debe tener mínimo 1 caracter, máximo 6 '
                    },
                    numeric: {
                            message: 'El valor debe ser un número ',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]/,
                        message: 'El valor no debe tener carácteres especiales '
                    }
                }
            },
            porcentaje: {
                validators: {
                    notEmpty: {
                        message: 'El porcentaje no puede estar vacio '
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: 'Debe tener mínimo 1 caracter, máximo 3 '
                    },
                    numeric: {
                            message: 'El valor debe ser un número ',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]/,
                        message: 'El porcentaje no debe tener carácteres especiales '
                    }
                }
            },
            cant_users: {
                validators: {
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Debe tener mínimo 1 caracter, máximo 4 '
                    },
                    numeric: {
                            message: 'El valor debe ser un número ',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]/,
                        message: 'los días no deben tener carácteres especiales '
                    }
                }
            },
            valor_bono: {
                validators: {
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Debe tener mínimo 1 caracter, máximo 4 '
                    },
                    numeric: {
                            message: 'El valor debe ser un número ',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]/,
                        message: 'los días no deben tener carácteres especiales '
                    }
                }
            },
            dias: {
                validators: {
                    notEmpty: {
                        message: 'Los días no pueden estar vacio '
                    },
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Debe tener mínimo 1 caracter, máximo 4 '
                    },
                    numeric: {
                            message: 'El valor debe ser un número ',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]/,
                        message: 'los días no deben tener carácter especiales '
                    }
                }
            }
        }
    });
    $('#changeForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'Las contraseñas deben ser iguales'
                    }
                }
            }
        }
    });
});
