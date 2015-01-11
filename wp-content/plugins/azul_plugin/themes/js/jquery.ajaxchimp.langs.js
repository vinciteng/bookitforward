(function ($) {
    'use strict';

    // ISO-693-1 Language codes: http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes

    // Submit Message
    // 'submit': 'Submitting...'

    // Mailchimp Responses
    // 0: 'We have sent you a confirmation email'
    // 1: 'Please enter a value'
    // 2: 'An email address must contain a single @'
    // 3: 'The domain portion of the email address is invalid (the portion after the @: )'
    // 4: 'The username portion of the email address is invalid (the portion before the @: )'
    // 5: 'This email address looks fake or invalid. Please enter a real email address'

    $.ajaxChimp.translations = {
        // Translation via https://github.com/lifeisfoo
        'it': {
            'submit': 'Registrazione in corso...',
            0: 'Ti abbiamo inviato una mail di conferma',
            1: 'Per favore inserisci una mail',
            2: 'Un indirizzo valido contiene una sola @',
            3: 'Il dominio della tua mail non &eacute; valido (la porzione dopo la @: )',
            4: 'Il nome della mail non &eacute; valido (la porzione prima della @: )',
            5: 'L\'indirizzo email sembra finto o non valido: per favore inseriscine uno reale'
        },

        // The translations below are from google translate, and may not be accurate.
        // Pull requests with translations for other languages as well as corrections are welcome.
        'de': {
            'submit': 'Aufnahme l&#228;uft...',
            0: 'Wir haben Ihnen eine Best&#228;tigungs-E-Mail verschickt',
            1: 'Bitte geben Sie einen Wert',
            2: 'Eine E-Mail-Adresse muss ein einzelnes enthalten @',
            3: 'Der Dom&#228;nenteil der E-Mail-Adresse ist ung&#252;ltig (der Teil nach dem @:)',
            4: 'Der Benutzername Teil der E-Mail-Adresse ist ung&#252;ltig (der Teil vor dem @:)',
            5: 'Diese E-Mail-Adresse sieht gef&#228;lscht oder ung&#252;ltig. Bitte geben Sie eine echte E-Mail-Adresse'
        },
        'es': {
            'submit': 'Grabaci&oacute;n en curso...',
            0: 'Te hemos enviado un email de confirmaci&oacute;n',
            1: 'Por favor, introduzca un valor',
            2: 'Una direcci&oacute;n de correo electr&oacute;nico debe contener una sola @',
            3: 'La parte de dominio de la direcci&oacute;n de correo electr&oacute;nico no es v&aacute;lida (la parte despu&eacute;s de la @:)',
            4: 'La parte de usuario de la direcci&oacute;n de correo electr&oacute;nico no es v&aacute;lida (la parte antes de la @:)',
            5: 'Esta direcci&oacute;n de correo electr&oacute;nico se ve falso o no v&aacute;lido. Por favor, introduce una direcci&oacute;n de correo electr&oacute;nico real'
        },
        'fr': {
            'submit': 'Enregistrement en cours...',
            0: 'Nous vous avons envoy√© un e-mail de confirmation',
            1: 'S\'il vous pla√Æt entrer une valeur',
            2: 'Une adresse e-mail doit contenir un seul @',
            3: 'La partie domaine de l\'adresse e-mail n\'est pas valide (la partie apr&eacute;s le @:)',
            4: 'La partie nom d\'utilisateur de l\'adresse email n\'est pas valide (la partie avant le signe @:)',
            5: 'Cette adresse e-mail semble faux ou non valides. S\'il vous pla√Æt entrer une adresse email valide'
        },
        'po': {
            'submit': 'Submeter...',
            0: 'Enviamos um e-mail de confirma&#231;&#227;o',
            1: 'Por favor insira um valor',
            2: 'Um endere&#231;o de e-mail deve conter uma &uacute;nica @',
            3: 'A parte do dom&iacute;nio do endere&#231;o de e-mail &eacute; inv&aacute;lido (a parte depois do @:)',
            4: 'A parte de nome de usu&aacute;rio do endere&#231;o de email &eacute; inv&aacute;lido (a parte antes do @:)',
            5: 'Este endere&#231;o de e-mail parece falso ou inv&aacute;lido. Por favor insira um endere&#231;o de email real'
        },
        'ru': {
            'submit': 'предоставление...',
            0: 'Мы направили вам подтверждение по электронной почте',
            1: 'Пожалуйста, введите значение',
            2: 'Адрес электронной почты должен содержать один @',
            3: 'Доменная часть адреса электронной почты является недействительным (часть после @:)',
            4: 'Имя пользователя, часть адреса электронной почты является недействительным (часть перед @:)',
            5: 'Этот адрес электронной почты выглядит фальшивка или недействительным. Пожалуйста, введите реальный адрес электронной почты'
        }
    };
})(jQuery);
