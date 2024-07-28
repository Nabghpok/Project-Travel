import React, { useState } from "react";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import PaymentPage from "./PaymentPage";

const countries = [
  "Singapore",
  "Nepal",
  "Indonesia",
  "UK",
  "Spain",
  "Egypt",
  "Dubai",
];
const ticketTypes = ["Economy", "Premium Economy", "Business"];

const basePrice = 100;
const priceIncrements = {
  Economy: 0,
  "Premium Economy": 50,
  Business: 100,
};

const FlightBookingForm = () => {
  const [fromCountry, setFromCountry] = useState("");
  const [toCountry, setToCountry] = useState("");
  const [selectedTicketType, setSelectedTicketType] = useState("");
  const [price, setPrice] = useState(0);
  const [showPaymentPage, setShowPaymentPage] = useState(false);
  const [departureDate, setDepartureDate] = useState("");

  const handleTicketTypeChange = (type) => {
    setSelectedTicketType(type);
    setPrice(basePrice + priceIncrements[type]);
  };

  const handleBook = () => {
    setShowPaymentPage(true);
  };

  if (showPaymentPage) {
    return (
      <PaymentPage
        fromCountry={fromCountry}
        toCountry={toCountry}
        ticketType={selectedTicketType}
        price={price}
        departureDate={departureDate}
      />
    );
  }

  return (
    <Card className="w-full max-w-md mx-auto">
      <CardHeader>
        <CardTitle>Book Your Flight</CardTitle>
      </CardHeader>
      <CardContent>
        <div className="space-y-4">
          <Select onValueChange={setFromCountry}>
            <SelectTrigger>
              <SelectValue placeholder="From Country" />
            </SelectTrigger>
            <SelectContent>
              {countries.map((country) => (
                <SelectItem key={country} value={country}>
                  {country}
                </SelectItem>
              ))}
            </SelectContent>
          </Select>

          <Select onValueChange={setToCountry}>
            <SelectTrigger>
              <SelectValue placeholder="To Country" />
            </SelectTrigger>
            <SelectContent>
              {countries.map((country) => (
                <SelectItem key={country} value={country}>
                  {country}
                </SelectItem>
              ))}
            </SelectContent>
          </Select>

          <Select onValueChange={handleTicketTypeChange}>
            <SelectTrigger>
              <SelectValue placeholder="Ticket Type" />
            </SelectTrigger>
            <SelectContent>
              {ticketTypes.map((type) => (
                <SelectItem key={type} value={type}>
                  {type}
                </SelectItem>
              ))}
            </SelectContent>
          </Select>

          <input
            type="date"
            onChange={(e) => setDepartureDate(e.target.value)}
            className="w-full p-2 border rounded"
          />

          {selectedTicketType && (
            <div className="text-lg font-semibold">
              Price for {selectedTicketType}: ${price.toFixed(2)}
            </div>
          )}

          <Button
            onClick={handleBook}
            disabled={
              !fromCountry ||
              !toCountry ||
              !selectedTicketType ||
              !departureDate
            }
            className="w-full"
          >
            Book Now
          </Button>
        </div>
      </CardContent>
    </Card>
  );
};

export default FlightBookingForm;
