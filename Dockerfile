# Sử dụng node image chính thức
FROM node:16 AS build

# Thiết lập thư mục làm việc
WORKDIR /app

# Copy package.json và package-lock.json (nếu có)
COPY package*.json ./

# Cài đặt các dependency
RUN npm install

# Copy toàn bộ mã nguồn của bạn vào container
COPY . .

# Build (nếu cần)
RUN npm run build

# Cổng mà app của bạn sẽ chạy
EXPOSE 3000

# Lệnh chạy ứng dụng
CMD ["npm", "start"]
