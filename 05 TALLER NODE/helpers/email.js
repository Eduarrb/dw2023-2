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
            <p>Hola ${nombre}, comprueba tu cuenta en kompi.com<p>
            <p>
                Tu cuenta ya esta lista, solo confirma en el siguiente enlace:
                <a href="${process.env.BACKEND_URL}:${process.env.PORT}/auth/confirmar/${token}">Confirmar Cuenta</a>
            <p>
            <p>Si no creaste esta cuenta, ignora el mensaje</p>

        `,
    });
};

export { emailRegistro }