import multer from 'multer';
import shortid from 'shortid';
import path from 'path';

const storage = multer.diskStorage({
    destination: function(req, file, cb){
        cb(null, '/public/uploads/productos');
    },
    filename: function(req, file, cb){
        cb(null, file.originalname);
    }

});

const upload = multer({storage}).single('imagen');
const subirImagen = (req, res, next) => {
    upload(req, res, function (error) {
        if (error instanceof multer.MulterError) {
            console.log(error)
        } else {
            console.log('todo ok')
            next();
        }
    });
}
export default subirImagen;