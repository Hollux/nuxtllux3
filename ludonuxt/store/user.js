export const state = () => ({
    user: ''
})

export const mutations = {
    logout(state) {
        state.user = []
    },
    login(state, info) {
        state.user = info
    }
}