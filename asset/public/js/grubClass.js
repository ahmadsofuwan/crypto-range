$(document).ready(function () {
    var grubClass = [
        // {
        //     grub:'.active',
        //     class:'border-black border-r-4 border-b-4 border-t-2 border-l'
        // },
        {
            grub:'.store-card',
            class:'bg-white aspect-auto rounded-3xl h-fit'
        },
        {
            grub:'.store-card-title',
            class:'bg-gray-200 w-1/2 text-center rounded-b-xl pt-2 pb-1'
        },
        {
            grub:'.store-card-hastag',
            class:'rounded-full w-6 h-6 text-white bg-gray-700 mx-1'
        },
        {
            grub:'.store-card-hastag-cover',
            class:'bg-gray-200 rounded-full border-1 border-black border-x-2 border-y-2 p-1 my-3'
        },
        {
            grub:'.store-card-info',
            class:'w-1/2 pb-3 border-teal-400 border-b-8 mb-3'
        },
        {
            grub:'.button-buy',
            class:'mx-auto rounded-full active w-1/5 bg-teal-400'
        },
        {
            grub:'.chest-slot',
            class:'rounded-3xl border-slate-300 bg-slate-200  w-1/2 border-4 text-center mx-2 text-2xl p-10 text-slate-400'
        },
    ];

    classGroup();function classGroup(){$.each(grubClass,function(b,a){$(a.grub).addClass(a.class),$(a.grub).removeClass(a.grub.replace(".",""))})}


});