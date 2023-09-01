import nodemailer from 'nodemailer';

const emailRegistro = async datos => {
    const transport = nodemailer.createTransport({
        host: process.env.EMAIL_HOST,
        port: process.env.EMAIL_PORT,
        auth: {
            user: process.env.EMAIL_USER,
            pass: process.env.EMAIL_PASS,
        },
    });

    const { nombre, email, token } = datos;

    await transport.sendMail({
        from: 'kompi2.com',
        to: email,
        subject: 'Confirma tu cuenta',
        text: 'Confirma tu cuenta',
        html: `
            <h1 
                style="
                    text-align: center
                    font-family: Arial, Helvetica, sans-serif
                ";
            >
                Hola ${nombre}, comprueba tu cuenta en kompi.com
            </h1>
            <p
                style="
                    font-family: Arial, Helvetica, sans-serif;
                "
            >
                Tu cuenta ya esta lista, solo confirma en el siguiente enlace:
            </p>
            <a 
                href="${process.env.BACKEND_URL}:${process.env.PORT}/auth/confirmar/${token}"
                style="
                    display: block;
                    font-family: Arial, Helvetica, sans-serif;
                    padding: 1rem;
                    background-color: #00c897;
                    color: white;
                    text-transform: uppercase;
                    text-align: center;
                    text-decoration: none;
                "
            >
                Confirmar Cuenta
            </a>
            <p>Si no creaste esta cuenta, ignora el mensaje</p>
        `,
    });
};

const olvidePassword = async datos => {
    const transport = nodemailer.createTransport({
        host: process.env.EMAIL_HOST,
        port: process.env.EMAIL_PORT,
        auth: {
            user: process.env.EMAIL_USER,
            pass: process.env.EMAIL_PASS,
        },
    });

    const { nombre, email, token } = datos;
    // console.log(datos)
    await transport.sendMail({
        from: 'kompi2.com',
        to: email,
        subject: 'Restablecer password',
        text: 'Restablecer password',
        html: `
            <h1 
                style="
                    text-align: center
                    font-family: Arial, Helvetica, sans-serif
                ";
            >
                Hola ${nombre}, Has solicitado restablecer tu password en Kompi.com
            </h1>
            <p
                style="
                    font-family: Arial, Helvetica, sans-serif;
                "
            >
                Sigue el siguiente enlace para ghenerar un password nuevo:
            </p>
            <a 
                href="${process.env.BACKEND_URL}:${process.env.PORT}/auth/olvide-password/${token}"
                style="
                    display: block;
                    font-family: Arial, Helvetica, sans-serif;
                    padding: 1rem;
                    background-color: #00c897;
                    color: white;
                    text-transform: uppercase;
                    text-align: center;
                    text-decoration: none;
                "
            >
                Restablecer password
            </a>
            <p>Si no creaste esta cuenta, ignora el mensaje</p>
        `,
    });
}

export { emailRegistro, olvidePassword }