<template>
    <v-app>
      <v-card>
        <v-card-title>
          Search Data Table
        </v-card-title>
        <v-card-text>
          <v-row>
            <v-col cols="12" md="6">
              <v-text-field
                v-model="search"
                label="Search"
                clearable
                outlined
                dense
              ></v-text-field>
            </v-col>
            <v-col cols="12" md="6">
              <v-menu
                ref="menu"
                v-model="menu"
                :close-on-content-click="false"
                :return-value.sync="dateRange"
                transition="scale-transition"
                offset-y
                max-width="290px"
                min-width="290px"
              >
                <template #activator="{ on }">
                  <v-text-field
                    v-model="dateRangeFormatted"
                    label="Date Range"
                    clearable
                    outlined
                    dense
                    append-icon="mdi-calendar"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker
                  v-model="dateRange"
                  range
                  no-title
                  scrollable
                ></v-date-picker>
                <v-card-actions>
                  <v-btn
                    color="primary"
                    text
                    @click="menu = false"
                  >
                    Cancel
                  </v-btn>
                  <v-btn
                    color="primary"
                    text
                    @click="searchByDateRange"
                  >
                    OK
                  </v-btn>
                </v-card-actions>
              </v-menu>
            </v-col>
          </v-row>
          <v-data-table
            :headers="headers"
            :items="items"
            :search="search"
            :items-per-page="itemsPerPage"
            :server-items-length="totalItems"
            :loading="loading"
            :no-data-text="noDataText"
            class="elevation-1"
          >
            <template #item.date="{ item }">
              {{ formatDate(item.date) }}
            </template>
            <template #item.actions="{ item }">
              <v-btn color="primary" text @click="editItem(item)">
                Edit
              </v-btn>
              <v-btn color="error" text @click="deleteItem(item)">
                Delete
              </v-btn>
            </template>
            <template #footer>
              <v-pagination
                v-model="page"
                :total-visible="5"
                :items-per-page="itemsPerPage"
                :length="Math.ceil(totalItems / itemsPerPage)"
                prev-icon="mdi-chevron-left"
                next-icon="mdi-chevron-right"
                class="mt-2"
                @input="getData"
              ></v-pagination>
            </template>
          </v-data-table>
        </v-card-text>
      </v-card>
    </v-app>
  </template>
  
  <script>
  import moment from 'moment';
  
  export default {
    name: 'DataTableExample',
    data() {
      return {
        headers: [
          { text: 'Name', value: 'name' },
          { text: 'Date', value: 'date' },
          { text: 'Amount', value: 'amount' },
          { text: 'Actions', value: 'actions', sortable: false },
        ],
        // items: [],
        items: Array.from({length: 100}, (_, i) => {
      return {
        name: `Item ${i + 1}`,
        date: faker.date.between('2022-01-01', '2022-12-31').toISOString().substr(0, 10),
        amount: faker.finance.amount(),
        actions: null,
      };
    }),
        search: '',
        dateRange: null,
        dateRangeFormatted: '',
        totalItems: 0,
        loading: false,
        noData: 'No data available',
        options: {
          itemsPerPageOptions: [10, 25, 50],
          sortBy: ['date'],
          sortDesc: [true],
        },
      };
    },
    watch: {
      dateRange(val) {
        if (val !== null) {
          this.dateRangeFormatted = `${moment(val[0]).format('YYYY-MM-DD')} - ${moment(val[1]).format('YYYY-MM-DD')}`;
          this.searchItems();
        } else {
          this.dateRangeFormatted = '';
          this.searchItems();
        }
      },
      search() {
        this.searchItems();
      },
    },
    methods: {
      fetchData() {
        // replace with your data fetching code
        this.loading = true;
        setTimeout(() => {
          this.items = [
            { name: 'Item 1', date: '2022-01-01', amount: 100 },
            { name: 'Item 2', date: '2022-01-02', amount: 200 },
            { name: 'Item 3', date: '2022-01-03', amount: 300 },
            { name: 'Item 4', date: '2022-01-04', amount: 400 },
            { name: 'Item 5', date: '2022-01-05', amount: 500 },
            { name: 'Item 6', date: '2022-01-06', amount: 600 },
            { name: 'Item 7', date: '2022-01-07', amount: 700 },
            { name: 'Item 8', date: '2022-01-08', amount: 800 },
            { name: 'Item 9', date: '2022-01-09', amount: 900 },
            { name: 'Item 10', date: '2022-01-10', amount: 1000 },
          ];
          this.totalItems = this.items.length;
          this.loading = false;
        }, 1000);
      },
      searchItems() {
        const { search, dateRange } = this;
        let filteredItems = this.items;
  
        if (search !== '') {
          filteredItems = filteredItems.filter((item) =>
            item.name.toLowerCase().includes(search.toLowerCase())
          );
        }
  
        if (dateRange !== null) {
          filteredItems = filteredItems.filter((item) => {
            const date = moment(item.date);
            const startDate = moment(dateRange[0]);
            const endDate = moment(dateRange[1]);
            return date.isBetween(startDate, endDate, null, '[]');
          });
        }
  
        this.totalItems = filteredItems.length;
        this.$refs.dataTable.page = 1;
        this.$refs.dataTable.items = filteredItems;
      },
    },
    created() {
      this.fetchData();
    },
  };
  </script>
  