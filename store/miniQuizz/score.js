export const state = () => ({
    score: [0, 0]
})

export const mutations = {
    scorePlusUn(state) {
        state.score[0]++
    },
    questionPlusUn(state) {
        state.score[1]++
    },
    reset(state) {
        state.score = [0, 0]
    },
}