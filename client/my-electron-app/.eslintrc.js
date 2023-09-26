export default {
	'extends': ['eslint:recommended', 'google'],
	'parser': '@typescript-eslint/parser',
	'plugins': ['@typescript-eslint'],
	'parserOptions': {
		'ecmaVersion': 2018,
	},
	'env': {
		'es6': true,
	},
	'rules': {
		'no-console': 'off',
		'@typescript-eslint/indent': ['error', 2],
		'linebreak-style': ['error', 'unix'],
		'no-tabs': 'off',
		"indent": ["off", 2],
		"max-len": ["error", { code: 300 }]
	},
};
