import Home from './Home.svelte';

var HomeApp = new Home ({
    target: document.body,
    props:{
        compName:'WhiteCoat Lab'
    }
});

export default HomeApp;