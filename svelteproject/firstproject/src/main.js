import App from './App.svelte';

const app = new App({
	target: document.body,
	props: {
		name: 'Hi, I am Svelte Javascript'
	}
});

export default app;