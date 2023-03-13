const loader = {
    'spinner': (selector) => document.querySelector(selector),
    'name': 'loader',
    'enable': function () {
        this.spinner('.loader span').classList.add('loader-spinner')
        this.spinner('.loader').classList.remove('loader-hide')
    },
    'clear': function () {
        const execute = () => {
            this.spinner('.loader span').classList.remove('loader-spinner')
            this.spinner('.loader').classList.add('loader-hide')
        }

        return setTimeout(execute, 3000)
    }
}

export default loader