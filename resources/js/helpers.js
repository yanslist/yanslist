export default {
    methods: {
        showNoti(type, msg) {
            window.UIkit.notification({
                status: type,
                message: msg,
                pos: 'bottom-center',
            });
        }
    }
}
