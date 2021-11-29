import Home from './components/Home'
import AddProduct from './components/AddProduct'
import EditProduct from './components/EditProduct'
export default{
    mode:'history',
    routes:[
        
        {
            path:'/',
            component:Home,
        },
        {
            path:'/add-product',
            component:AddProduct,
        },
        {
            name:"edit-product",
            path:'edit-product/edit/:id?',
            component:EditProduct
        }
        
    ]
}