import multer from 'multer';
import shortid from 'shortid';

const storage = multer.diskStorage({
    destination: function (req, file, next) {
        next(null, 'public/uploads/productos/');
    },
    filename: function (req, file, next) {
        const extension = file.originalname.split('.')[1];
        next(null, `${shortid.generate()}.${extension}`);
    },
});

const limits = {
    fileSize: 100000
}

const fileFilter = (req, file, next) => {
    if(file.mimetype === 'image/jpeg' || file.mimetype === 'image/png'){
        next(null, true);
    } else {
        next(new Error('Formato no valido'), false);
    }
}

const upload = multer({ storage, limits, fileFilter }).single('imagen');

const subirImagen = (req, res, next) => {
    upload(req, res, function (error) {
        if (error) {
            if(error instanceof multer.MulterError){
                if(error.code === 'LIMIT_FILE_SIZE'){
                    req.flash('error', ['El archivo es muy pesado']);
                } else {
                    req.flash('error', [error.message]);
                }
            } else if (error.hasOwnProperty('message')){
                req.flash('error', [error.message]);
            }
            res.redirect('back');
            return;
        } else {
            next();
        }
    });
};

export default subirImagen;
