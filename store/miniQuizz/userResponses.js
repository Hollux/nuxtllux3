export const state = () => ({
    userResponses: []
})

export const mutations = {
    add(state, array) {
        state.userResponses.push(array)
    },
    remove(state, { todo }) {
        state.userResponses.splice(state.userResponses.indexOf(todo), 1)
    },
    reset(state) {
        state.userResponses = []
    }
}