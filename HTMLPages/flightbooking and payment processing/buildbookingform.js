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
import { Input } from "@/components/ui/input";
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
  const [bookingDetails, setBookingDetails] = useState({
    fromCountry: "",
    toCountry: "",
    ticketType: "",
    departureDate: "",
    price: 0,
  });
  const [showPaymentPage, setShowPaymentPage] = useState(false);

  const handleInputChange = (field, value) => {
    setBookingDetails((prev) => {
      const newDetails = { ...prev, [field]: value };
      if (field === "ticketType") {
        newDetails.price = basePrice + priceIncrements[value];
      }
      return newDetails;
    });
  };

  const handleBook = () => {
    setShowPaymentPage(true);
  };

  const handleBackToBooking = () => {
    setShowPaymentPage(false);
  };

  if (showPaymentPage) {
    return (
      <PaymentPage
        bookingDetails={bookingDetails}
        onBackToBooking={handleBackToBooking}
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
          <Select
            onValueChange={(value) => handleInputChange("fromCountry", value)}
          >
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

          <Select
            onValueChange={(value) => handleInputChange("toCountry", value)}
          >
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

          <Select
            onValueChange={(value) => handleInputChange("ticketType", value)}
          >
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

          <Input
            type="date"
            onChange={(e) => handleInputChange("departureDate", e.target.value)}
            className="w-full p-2 border rounded"
          />

          {bookingDetails.ticketType && (
            <div className="text-lg font-semibold">
              Price for {bookingDetails.ticketType}: $
              {bookingDetails.price.toFixed(2)}
            </div>
          )}

          <Button
            onClick={handleBook}
            disabled={
              !bookingDetails.fromCountry ||
              !bookingDetails.toCountry ||
              !bookingDetails.ticketType ||
              !bookingDetails.departureDate
            }
            className="w-full"
          >
            Proceed to Payment
          </Button>
        </div>
      </CardContent>
    </Card>
  );
};

export default FlightBookingForm;
