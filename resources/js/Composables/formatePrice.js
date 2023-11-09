import {computed} from 'vue';

const formatingPrice = (price)=>{
    const formattedPrice = computed(
        ()=> Number(price).toLocaleString("en-Us", { 
            style: "currency",
            currency: "USD",
            maximumFractionDigit:2
        }),
    );

    return {formattedPrice}
}

export default formatingPrice;