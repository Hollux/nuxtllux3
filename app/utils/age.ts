export const BIRTH_DATE = new Date(1991, 2, 19)

/** Âge en années révolues à la date donnée. */
export function ageAt(date: Date = new Date()): number {
  const age = date.getFullYear() - BIRTH_DATE.getFullYear()
  const birthdayPassed =
    date.getMonth() > BIRTH_DATE.getMonth() ||
    (date.getMonth() === BIRTH_DATE.getMonth() && date.getDate() >= BIRTH_DATE.getDate())
  return birthdayPassed ? age : age - 1
}
