var app = new Vue({
    el: '#app',
    data: {
        preview: ""
    },
    methods: {
        change: function(e){
            var file = e.target.files[0];
            if(file && file.type.match(/^image\/(png|jpeg)$/)){
                this.preview = URL.createObjectURL(file);
            }
        }
    }
});
