<template>
  <v-app>
    
    <!-- Contenido Principal -->
    <v-main>
      <v-container>
        <v-row>
          <!-- Columna Izquierda -->
          

          <!-- Calendario -->
          <v-col cols="7">
            <div class="custom-calendar-container">
              <div ref="calendar" style="height: 700px;"></div>
            </div>
          </v-col>

          <!-- Columna Derecha (Lista de Eventos) -->
          <v-col cols="3">
            <v-card class="sidebar">
              <v-list>
                <v-list-item>
                  <v-text-field
                    v-model="search"
                    label="Buscar eventos"
                    class="mx-4"
                    clearable
                  ></v-text-field>
                </v-list-item>
                <v-list>
                  <v-list-item
                    v-for="event in filteredEvents"
                    :key="event.id"
                  >
                    <v-list-item-content>
                      <v-list-item-title>{{ event.title }}</v-list-item-title>
                      <v-list-item-subtitle>
                        {{ event.start | formatDate }} - {{ event.end | formatDate }}
                      </v-list-item-subtitle>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
              </v-list>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Calendar from 'tui-calendar';
import 'tui-calendar/dist/tui-calendar.css';
import 'tui-date-picker/dist/tui-date-picker.css';
import 'tui-time-picker/dist/tui-time-picker.css';

export default {
  name: 'TuiCalendar',
  data() {
    return {
      calendar: null,
      events: [],
      search: '',
    };
  },
  mounted() {
    this.initializeCalendar();
  },
  methods: {
    initializeCalendar() {
      this.calendar = new Calendar(this.$refs.calendar, {
        defaultView: 'month',
        taskView: true,
        scheduleView: true,
        useDetailPopup: true,
        useCreationPopup: true,
      });

      this.loadEvents();

      this.calendar.on('beforeCreateSchedule', (event) => {
        this.addEvent(event);
      });

      this.calendar.on('beforeUpdateSchedule', (event) => {
        this.editEvent(event);
      });

      this.calendar.on('beforeDeleteSchedule', (event) => {
        this.deleteEvent(event);
      });
    },
    loadEvents() {
      const schedules = [
        {
          id: '1',
          calendarId: '1',
          title: 'Evento de Prueba',
          category: 'time',
          start: '2024-08-25T10:00:00',
          end: '2024-08-25T12:00:00',
        },
      ];

      this.events = schedules;
      this.calendar.createSchedules(schedules);
    },
    addEvent(event) {
      const newEvent = {
        id: String(Date.now()),
        title: event.title,
        start: event.start,
        end: event.end,
        category: event.isAllDay ? 'allday' : 'time',
      };
      this.calendar.createSchedules([newEvent]);
      this.events.push(newEvent);
    },
    editEvent(event) {
      const { schedule, changes } = event;
      this.calendar.updateSchedule(schedule.id, schedule.calendarId, changes);

      const index = this.events.findIndex((e) => e.id === schedule.id);
      if (index !== -1) {
        this.events[index] = { ...this.events[index], ...changes };
      }
    },
    deleteEvent(event) {
      const { schedule } = event;
      this.calendar.deleteSchedule(schedule.id, schedule.calendarId);

      this.events = this.events.filter((e) => e.id !== schedule.id);
    },
  },
  computed: {
    filteredEvents() {
      return this.events.filter((event) => {
        return event.title.toLowerCase().includes(this.search.toLowerCase());
      });
    },
  },
  filters: {
    formatDate(value) {
      if (!value) return '';
      return new Date(value).toLocaleString();
    },
  },
};
</script>

<style scoped>
.custom-calendar-container {
  background-color: #cecece;
  border-radius: 12px;
  padding: 15px;
}

.sidebar {
  background-color: #000000;
  padding: 10px;
  border-radius: 8px;
}

.v-application .v-toolbar {
  background-color: #4CAF50 !important;
}

.v-application .v-btn {
  color: #4444 !important;
}

.tui-full-calendar-weekday-grid {
  background-color: #4444;
  color: #333;
  font-family: 'Roboto', sans-serif;
}

.tui-full-calendar-day {
  border: 1px solid #444444;
  color: #444444;
  font-size: 14px;
}

.tui-full-calendar-time-schedule {
  background-color: #81C784;
  color: #4444;
  border-radius: 8px;
  padding: 5px;
}

.tui-full-calendar-header {
  background-color: #4CAF50;
  color: 4444;
  font-weight: bold;
}

.tui-full-calendar-navi-btn {
  background-color: #4CAF50;
  color: 4444;
  border-radius: 5px;
}
</style>
