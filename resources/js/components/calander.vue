<template>
     <b-container>
            <main class="b-calendar">
                <b-row>
                    <b-col md="4">
                        <div class="b-calendar__information">
                            <div class="today d-flex justify-content-center align-items-center">
                                <div class="weekDay">
                                    {{selectedWeekDay | capitalize}}
                                </div>
                                <div class="day">
                                    {{selectedDayAndMonth.day}}
                                </div>
                                <div class="month">
                                    {{selectedDayAndMonth.month | capitalize}}
                                </div>
                                <a href="#" id="goTodayLink" @click="goToday" v-show="!todayInCurrentMonthAndYear || !todayIsEqualSelectDate">
                                    Today
                                </a>
                                <b-tooltip target="goTodayLink" v-show="!todayInCurrentMonthAndYear || !todayIsEqualSelectDate">
                                    Back to today
                                </b-tooltip>
                            </div>
                        </div>
                    </b-col>
                    <b-col md="8">
                        <div class="b-calendar__calendar">
                            <div class="b-calendar__header">
                                <b-row>
                                    <b-col class="year text-right" align-h="end">
                                        <span>{{year}}</span>
                                    </b-col>
                                </b-row>
                                <b-row align-v="center">
                                    <b-col class="text-left" align-h="start">
                                        <b-button id="subtractMonthBtn" class="arrow arrow-left" variant="light" @click="subtractMonth">
                                            <i class="fa fa-fw fa-chevron-left"></i>
                                        </b-button>
                                        <b-tooltip target="subtractMonthBtn">
                                            {{previousMonthAsString | capitalize}}
                                        </b-tooltip>
                                    </b-col>
                                    <b-col class="text-center" align-h="center">
                                        <span class="month">{{month}}</span>
                                    </b-col>
                                    <b-col class="text-right d-flex flex-row-reverse" align-h="end">
                                        <b-button id="addMonthBtn" class="arrow arrow-right" variant="light" @click="addMonth">
                                            <i class="fa fa-fw fa-chevron-right"></i>
                                        </b-button>
                                        <b-tooltip target="addMonthBtn">
                                            {{nextMonthAsString | capitalize}}
                                        </b-tooltip>
                                    </b-col>
                                </b-row>
                            </div>
                            <div class="b-calendar__weekdays">
                                <div class="weekday" v-for="(day, index) in days" :key="index">
                                    <strong>{{day}}</strong>
                                </div>
                            </div>
                            <div class="b-calendar__dates">
                                <div class="date text-right" :class="{
                                'today': date.today,
                                'blank': date.blank,
                                'no-border-right': date.key % 7 === 0,
                             }"
                                    v-for="date in dateList" :key="date.key" :data-date="date.date" @click="setSelectedDate(date.moment)">
                                    <span class="day">{{date.dayNumber}}</span>
                                    <span class="weekday">{{date.weekDay}}</span>
                                    <div class="additional" v-show="date.additional">
                                        <span class="year" v-show="date.additional.year">{{date.additional.year}}</span>
                                        <span class="month" v-show="date.additional.month">{{date.additional.month}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b-col>
                </b-row>
            </main>
          <footer class="b-footer">
                <b-row align-v="center" align-h="center">
                    <b-col md="6" class="text-center">
                        You can view the calendar of events 
                        <b-link to="https://codepen.io/sanya_misharin/pen/bQgjog" target="_blank">here</b-link>
                    </b-col>
                </b-row>
            </footer>
        </b-container>
</template>
<style lang="scss" scoped>
$font-family-base: "HelveticaNeue-Light", "Helvetica Neue Light",
    "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
$font-weight-base: 300;
$font-size: 1.125em;
$line-height: 1.3;

body {
    font-family: $font-family-base;
    font-weight: $font-weight-base;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: $font-size;
    line-height: $line-height;
}

.b-calendar {
    display: flex;
    align-items: center;
    margin: 2.5em 0;
    &__information {
        background-color: rgba(0, 123, 255, 0.2);
        border-radius: 1.2rem 0 0 1.2rem;
        height: 100%;
        .today {
            flex-direction: column;
            padding-top: 3em;
            .weekDay {
                font-size: 1.2em;
                font-weight: 100;
                padding-bottom: 0.5em;
            }
            .day {
                font-size: 5.5em;
                font-weight: 600;
                line-height: 1;
            }
            .month {
                font-size: 2em;
                font-weight: 200;
                line-height: 1;
            }
        }
    }
    &__calendar {
        min-height: 40rem;
    }
    &__header {
        margin-bottom: 2rem;
        .month {
            font-size: 1.25em;
            font-weight: 200;
            text-transform: capitalize;
        }
        .year {
            font-size: 1.5em;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .arrow {
            background: transparent;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 2.5rem;
            width: 2.5rem;
            &:hover {
                cursor: pointer;
            }
            &-left {
                i {
                    transform: translateX(-10%);
                }
            }
            &-right {
                i {
                    transform: translateX(10%);
                }
            }
        }
    }
    &__weekdays {
        display: flex;
        margin-bottom: 1.25rem;
        .weekday {
            width: calc(100% / 7);
            padding: 0.25rem 0.5rem;
        }
    }
    &__dates {
        display: flex;
        flex-wrap: wrap;
        position: relative;
        &:after {
            content: "";
            position: absolute;
            bottom: 0;
            background-color: #fff;
            height: 1px;
            width: 100%;
            z-index: 1;
        }
        .date {
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 200;
            min-height: 4.5rem;
            padding: 0.25rem 0.5rem;
            position: relative;
            width: calc(100% / 7);
            &.blank {
                background-color: rgba(0, 0, 0, 0.02);
                color: rgba(0, 0, 0, 0.2);
            }
            &.no-border-right {
                border-right: none;
            }
            &.today {
                background-color: rgba(0, 123, 255, 0.2);
            }
            .weekday {
                display: none;
            }
            .additional {
                font-size: 0.75em;
                position: absolute;
                bottom: 0.25rem;
                left: 0.5rem;
                .year {
                    padding-right: 0.25rem;
                    font-size: 0.75em;
                }
            }
        }
    }
}

.b-footer {
    padding: 15px 0;
}

@media (max-width: 768px) {
    .b-calendar__information {
        min-height: auto;
        padding-top: 2rem;
        padding-bottom: 2rem;
        border-radius: 2.5rem 2.5rem 0 0;
        .today {
            padding-top: 0;
        }
    }
}

@media (max-width: 480px) {
    .b-calendar {
        &__weekdays {
            display: none;
        }
        &__dates {
            .date {
                width: 100%;
                text-align: left !important;
                border: none;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                display: flex;
                &.blank {
                    display: none;
                }
                .weekday {
                    display: block;
                    margin-left: 0.25rem;
                }
            }
        }
    }
}

</style>

<script>
    export default {
        
        mounted() {
            console.log('Component mounted.')
        }
    }
   

</script>
